<footer class="footer">
    <div class="container-fluid content">
      <div class="row justify-content-center m-0 p-0">
        <div class="col-12 container_contact">
          <div class="row align-left">
            <div class="col-9 p-0 contact">
              <a href="{{ route('contact') }}" class="footerlink">Contact</a>
              <ul class="link_list">
                <li>
                  <a href="https://wa.me/34932760467" class="footerlink" target="_blank">
                    +34 666 666 666
                  </a>
                </li>
                <li>
                  <a href="mailto:centre@encis-dietetica.com" class="footerlink">
                    joel@dayssist.com
                  </a>
                </li>
              </ul>
            </div>
            <div class="col-3 p-0 newsletter">
              <p class="headerlink">Newsletter</p>
              <form action="#" method="POST">
                <!-- CSRF token -->
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="input-group mb-3">
                  <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="button-addon2" name="email">
                  <button class="btn btn-outline-secondary btn-newsletter" type="submit" id="button-addon2">Enviar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  