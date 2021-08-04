<div class="col-md-12">
    <div class="container">
        <div class="addList mt-3">
            <div class="col-auto p-0">
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                <button class="btn btn-addNew" type="button">
                    <i class="fas fa-plus"></i>
                </button>
                </div>
                <input type="text" class="form-control event" placeholder="輸入待辦事項...">
            </div>
            </div>
        </div>
    </div>
</div>

<!--放置代辦事件區-->
<ul class="listTo"></ul>

<button class="test">click me</button>

<script>

  var listTo = document.querySelector('.listTo');   //事件列表
  var sendData = document.querySelector('.btn-addNew');   //新增事件按鈕
  var data = JSON.parse(localStorage.getItem('listData')) || []; //將事件從轉JSON資料轉成陣列，若無資料則回傳空陣列
  
  sendData.addEventListener('click', addlistTo); //點擊新增按鈕的事件監聽
  listTo.addEventListener('click', listDone); //點擊刪除按鈕的事件監聽
  updateList(data); //更新事件(網頁內容)

  //-- 加入待辦事件，並同步更新網頁與 localstorage
  function addlistTo(e) {
      
      e.preventDefault();  //避免原本的動作執行
      
      var text = document.querySelector('.event').value;  //取得輸入在input的值
      var todo = {
          content: text  //定義todo物件
      };
      data.push(todo);  //增加入待辦事件到陣列中
      console.log(todo);
      
      updateList(data);  //更新網頁內容
      localStorage.setItem('listData', JSON.stringify(data));  //將待辦事件轉化成 JSON 字串 
      console.log(data);
  };


  //-- 更新網頁內容
  function updateList(items) {
      str = '';
      var len = items.length;
      
      for(var i =0; len > i; i++){
          str += '<li><span class="mr-2">' + items[i].content + '</span><i class="fas fa-trash-alt istyle" data-listnum=' + i + ' ></i></li>';
      }
      listTo.innerHTML = str;
  };


  //-- 刪除待辦事項
  function listDone(e) {
      e.preventDefault();  //避免原本的動作執行
      
      console.log(e.target.nodeName);  //確認點到的元素
      if(e.target.nodeName !== 'path'){
          //console.log("1");
          return
      };  //若沒有點到刪除icon的話，則中斷function
      
      var listnum = e.target.dataset.listnum;  //定義選到的待辦事項
      data.splice(listnum, 1);  //刪除事項
      
      //更新網頁內容
      localStorage.setItem('listData', JSON.stringify(data));
      updateList(data);
  };

  var test = document.querySelector('.test');

  test.addEventListener('click', testTarget);

  function testTarget(e) {
      e.preventDefault();  //避免原本的動作執行
      
      console.log(e);
  };
</script>

<hr>

<button type='button' onclick="TESTA()">按我 代入值</button>
<input type="text" name="vid">

<script>

    var str = '';
    function TESTA(){
        $('input[name="vid"]').val("ABC");
        str = $('input[name="vid"]').val();
        console.log(str);
    }
</script>

