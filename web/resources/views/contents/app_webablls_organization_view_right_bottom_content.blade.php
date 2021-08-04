<div>
  <div>
    <label class="app-right-bottom-title" for="Organization_Name">Organization Name</label>
    <p class="app-right-bottom-content app-right-bottom-content-2-mr">{{$Info->get('Name')}}</p>
  </div>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title" for="Subscription_expiration_date">Subscription expiration date</label>
    <p class="app-right-bottom-content app-right-bottom-content-2-mr">{{$Info->get('Expriation')}}</p>
  </div>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title" for="Reserved_seats">Reserved seats</label>
    <p class="app-right-bottom-content app-right-bottom-content-2-mr">{{$Info->get('TotalSeats')}}</p>
  </div>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title" for="Used_reserved_seats">Used reserved seats</label>
    <p class="app-right-bottom-content app-right-bottom-content-2-mr">{{$Info->get('UsedSeats')}}</p>
  </div>
</div>