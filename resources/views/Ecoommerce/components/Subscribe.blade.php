<div class="subscribe-form">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <div class="line-dec"></div>
            <h1>¡Suscríbete ahora!</h1>
          </div>
        </div>
        <div class="col-md-8 offset-md-2">
          <div class="main-content">
            <p>Sucribete y recibe notificaciones sobre nuevos productos y/o descuentos especiales.</p>
            <div class="container">
              <form id="subscribe" action="{{route('suscripcion')}}" method="post">
                @csrf
                <div class="row">
                  <div class="col-md-7">
                    <fieldset>
                      <input name="correo" type="email" class="form-control" id="email" placeholder="Correo electronico" required>
                    </fieldset>
                  </div>
                  <div class="col-md-5">
                    <fieldset>
                      <button type="submit" id="form-submit" class="button">¡Suscríbete ahora!</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>