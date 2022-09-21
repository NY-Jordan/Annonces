@if (Auth::check())  
<div class="modal fade" id="points"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="width: 700px;">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Mes points</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container row" style="margin-bottom: 20px;">
            <div class="col-8">
              <div class="h3">Points Bonus :  {{ Auth::user()->bonus_points }}</div> 
            </div>
            <div class="col-4">
              <div class="h3">Points :  {{ Auth::user()->points }}</div> 
            </div>
          </div>
          <div class="h2" style="margin-bottom: 50px; text-align:center;">Obtenir des points</div>
          <ul>
            <li style="margin: 15px;">
              <div class="row" >
                <div class="col-5" style="padding: 10px;">
                  <div class="h6">15 Points/100 Fcfa</div> 
                </div>
                <div class="col-4" style="padding: 10px;">
                  <div class="h6">Validité : 1 jour</div> 
                </div>
                <div class="col-3">
                  <a href="{{ route("paymentPoints", [
                    "amount" => 10,
                    "points" => 15,
                    "status" => "Get points",
                  ]) }}">
                    <button class="btn btn-primary">Souscrire</button>
                  </a>
                </div>
              </div>
            </li>
            <li style="margin: 15px;">
              <div class="row" >
                <div class="col-5" style="padding: 10px;">
                  <div class="h6">30 Points/250 Fcfa</div> 
                </div>
                <div class="col-4" style="padding: 10px;">
                  <div class="h6">Validité : 3 jours</div> 
                </div>
                <div class="col-3">
                  <a href="{{ route("paymentPoints", [
                    "amount" => 10,
                    "points" => 30,
                    "status" => "Get points",
                  ]) }}">
                    <button class="btn btn-primary">Souscrire</button>
                  </a>
                </div>
              </div>
            </li>
            <li style="margin: 15px;">
              <div class="row" >
                <div class="col-5" style="padding: 10px;">
                  <div class="h6">50 Points/500 Fcfa</div> 
                </div>
                <div class="col-4" style="padding: 10px;">
                  <div class="h6">Validité : 7 jours</div> 
                </div>
                <div class="col-3">
                  <a href="{{ route("paymentPoints", [
                    "amount" => 10,
                    "points" => 50,
                    "status" => "Get points",
                  ]) }}">
                    <button class="btn btn-primary">Souscrire</button>
                  </a>
                </div>
              </div>
            </li>
          </ul>
          <div> <strong>NB: gagner des points bonus en mettant vos anonces au premier plan</strong> </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  @endif
