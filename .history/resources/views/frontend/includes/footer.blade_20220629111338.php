<footer class="footer footer-default bg-dark text-light">
        <section class="footer-section">
          <div class="container">
            <div class="row">              

              <div class="col-md-12 col-lg-12 col-sm-3 sm-m-15px-tb md-m-30px-b text-center">
                <ul class="social-icons text-center">
                  <li><a class="facebook" href="#"><i class="fab fa-facebook-square h2"></i></a></li>
                  <li><a class="twitter" href="#"><i class="fab fa-twitter-square h2"></i></a></li>
                </ul>
              </div> 
              <div class="col-12 col-md-12 col-lg-12 sm-m-15px-tb text-center">
                <ul class="fot-link text-center">
                    <li>
                        <a href="/">
                            {{ config('app.name', 'Laravel Starter') }}
                        </a>
                    </li>
                    <span class="separator"> | </span>
                    @guest
                    @if(user_registration())
                    <li>
                        <a href="{{ route('register') }}">
                            Register
                        </a>
                    </li>
                    <span class="separator"> | </span>
                    @endif
                    <li>
                        <a href="{{ route('login') }}">
                            Login
                        </a>
                    </li>
                    @else
                    <li>
                        <a href="#">
                            {{ Auth::user()->name }}
                        </a>
                    </li>
                    <span class="separator"> | </span>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    @endguest

                    <span class="separator"> | </span>
                    <li><a href="{{ route('frontend.contact')}}">Contact</a></li>
                    <span class="separator"> | </span>
                    <li><a href="{{ route('frontend.faq')}}">Faq</a></li>
                    <span class="separator"> | </span>
                    <li><a href="{{ route('frontend.mentionLegale')}}">Mentions légales</a></li>
                    <span class="separator"> | </span>
                    <li><a href="{{ route('frontend.conditionGenerale')}}">Conditions générales</a></li>
                </ul>
              </div>
                 
            </div>
            
            <div class="footer-copy pl-2">
              <div class="row mt-3">
                <div class="col-12 text-center">
                  <p class="text-muted">&copy;
                    <script>document.write(new Date().getFullYear())</script> {{ config('app.name', 'souhaitNaissance.fr') }}</p>
                </div>
              </div>
            </div> <!-- footer-copy -->
    
          </div> <!-- container -->   
        </section>
      </footer>