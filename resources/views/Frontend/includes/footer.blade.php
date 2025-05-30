<footer class="wpo-site-footer">
    <div class="wpo-upper-footer">
        <div class="container">
            <div class="row">
                <div class="col col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="widget about-widget">
                        <div class="logo widget-title">
                            <a href="{{ route('index') }}">
                                <img src="{{ asset($generalsetting->dark_logo) }}" alt="logo">
                            </a>
                        </div>
                        <p>Elit commodo nec urna erat morbi at hac turpis aliquam.
                            In tristique elit nibh turpis. Lacus volutpat ipsum convallis tellus pellentesque
                            etiam.</p>
                        <ul>
                            @foreach ($social_media as $value)
                                <li>
                                    <a href="{{ $value->link }}">
                                        <i class="{{ $value->icon }}"></i>
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
                <div class="col col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="widget link-widget">
                        <div class="widget-title">
                            <h3>Contact Us</h3>
                        </div>
                        <div class="contact-ft">
                            <ul>
                                <li><i class="mt-2 fi flaticon-mail"></i><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></li>
                                <li><i class="mt-2 fi flaticon-phone"></i><a href="tel:{{ $contact->phone }}"></a>{{ $contact->phone }}</li>
                                <li><i class="mt-2 fi flaticon-mail"></i><a href="mailto:{{ $contact->hotmail }}">{{ $contact->hotmail }}</a></li>
                                <li><i class="mt-2 fi flaticon-phone"></i><a href="tel:{{ $contact->hotline }}"></a>{{ $contact->hotline }}</li>
                                <li><i class="mt-1 fi flaticon-pin"></i>{{ $contact->address }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col col-xl-3 col-lg-2 col-md-6 col-sm-12 col-12">
                    <div class="widget link-widget">
                        <div class="widget-title">
                            <h3>Categories</h3>
                        </div>
                        <ul>
                            @foreach ($categories as $value)
                                <li><a
                                        href="{{ route('category.product', $value->slug) }}">{{ $value->category_name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="widget link-widget">
                        <div class="widget-title">
                            <h3>Quick Links</h3>
                        </div>
                        <ul>
                            <li><a href="{{ route('index') }}">Home</a></li>
                            <li><a href="product.html">Women</a></li>
                            <li><a href="product.html">Kids</a></li>
                            <li><a href="product.html">Shoe</a></li>
                            <li><a href="product.html">Jewelry</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </div>
    <div class="wpo-lower-footer">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <p class="copyright"> Copyright &copy; 2025 Themart by <a href="{{ route('index') }}">wpOceans</a>.
                        All
                        Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Click to Contact -->
    <a href="{{ $generalsetting->messenger }}" target="_blank" style="position: fixed;bottom: 90px;right: 10px;z-index:111">
        <img src="http://localhost/ayaatsfashion/public/backEnd/assets/images/messenger.png" style="height:55px;border-radius:50%">
    </a>
</footer>
