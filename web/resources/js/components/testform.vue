<template>
  <uploader :options="options" class="uploader-example">
    <uploader-unsupport></uploader-unsupport>
    <uploader-drop>
      <p>Drop files here to upload or</p>
      <uploader-btn :attrs="attrs">select images</uploader-btn>
      <uploader-btn :directory="true">select folder</uploader-btn>
    </uploader-drop>
    <uploader-list></uploader-list>
  </uploader>
</template>

<script>
  export default {
    data () {
      return {
        options: {
          target: 'somewhere to upload',
          testChunks: false,
          chunkSize: 1024*1024*2,  //1MB
          simultaneousUploads: 3, //并发上传数
          headers: {
                'access-token': 'abcd1234'
          },
        },
        attrs: {
          accept: 'image/*'
        },
        statusText: {
          success: '成功了',
          error: '出錯了',
          uploading: '上傳中',
          paused: '暫停中',
          waiting: '等待中'
        }
      }
    }
  }



  </script>

  <style>
    .uploader-example {
      width: 880px;
      padding: 15px;
      margin: 40px auto 0;
      font-size: 12px;
      box-shadow: 0 0 10px rgba(0, 0, 0, .4);
    }
    .uploader-example .uploader-btn {
      margin-right: 4px;
    }
    .uploader-example .uploader-list {
      max-height: 440px;
      overflow: auto;
      overflow-x: hidden;
      overflow-y: auto;
    }
</style>
