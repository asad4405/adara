<footer class="wpo-site-footer">
    <div class="wpo-upper-footer">
        <div class="container">
            <div class="row">
                <div class="col col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="widget about-widget">
                        <div class="logo widget-title">
                            <img src="{{ asset('public/Frontend') }}/images/logo-2.svg" alt="blog">
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
                                <li><i class="fi flaticon-mail"></i>{{ $contact->email }}</li>
                                <li><i class="fi flaticon-phone"></i>{{ $contact->phone }}</li>
                                <li><i class="fi flaticon-pin"></i>{{ $contact->address }}</li>
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
                                <li><a href="{{ route('category.product',$value->slug) }}">{{ $value->category_name }}</a></li>
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
                    <p class="copyright"> Copyright &copy; 2025 Themart by <a href="index.html">wpOceans</a>.
                        All
                        Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
