@extends('layouts.frontend.master')

@section('title', 'Home')

@section('content')
<!-- Slider Pro CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slider-pro/1.5.0/css/slider-pro.min.css" />
<!-- LightGallery CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/css/lightgallery-bundle.min.css">

<section class="product_single_sec pt-4 pb-5">
    <div class="container">
        <div class="cusbreadcrumb mb-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-1">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/shop">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Product Name</li>
                </ol>
            </nav>
        </div>
        <div class="row gx-lg-5 mb-3">
            <div class="col-lg-6 my-2">
                <div class="product_gallery">
                    <div id="product-gallery" class="slider-pro">
                        <div class="sp-slides">

                            <!-- Slide 1 -->
                            <div class="sp-slide">
                                <a href="{{ asset('assets/images/product_img1.jpg') }}" class="full_icon">
                                    <i class="fa-solid fa-expand"></i>
                                </a>
                                <img class="sp-image img-fluid" src="{{asset ('assets/images/product_img1.jpg')}}" data-src="{{asset ('assets/images/product_img1.jpg')}}" alt="Product image 1" />
                            </div>

                            <!-- Slide 2 -->
                            <div class="sp-slide">
                                <a href="{{ asset('assets/images/product_img11.jpg') }}" class="full_icon">
                                    <i class="fa-solid fa-expand"></i>
                                </a>
                                <img class="sp-image img-fluid" src="{{asset ('assets/images/product_img11.jpg')}}" data-src="{{asset ('assets/images/product_img11.jpg')}}" alt="Product image 2" />
                            </div>

                            <!-- Slide 3 -->
                            <div class="sp-slide">
                                <a href="{{ asset('assets/images/product_img2.jpg') }}" class="full_icon">
                                    <i class="fa-solid fa-expand"></i>
                                </a>
                                <img class="sp-image img-fluid" src="{{asset ('assets/images/product_img2.jpg')}}" data-src="{{asset ('assets/images/product_img2.jpg')}}" alt="Product image 3" />
                            </div>

                            <!-- Slide 4 -->
                            <div class="sp-slide">
                                <a href="{{ asset('assets/images/product_img3.jpg') }}" class="full_icon">
                                    <i class="fa-solid fa-expand"></i>
                                </a>
                                <img class="sp-image img-fluid" src="{{asset ('assets/images/product_img3.jpg')}}" data-src="{{asset ('assets/images/product_img3.jpg')}}" alt="Product image 3" />
                            </div>

                        </div>

                        <!-- Thumbnails -->
                        <div class="sp-thumbnails">
                            <img class="sp-thumbnail img-fluid" src="{{asset ('assets/images/product_img1.jpg')}}" alt="Product Thumb 1" />
                            <img class="sp-thumbnail img-fluid" src="{{asset ('assets/images/product_img11.jpg')}}" alt="Product Thumb 2" />
                            <img class="sp-thumbnail img-fluid" src="{{asset ('assets/images/product_img2.jpg')}}" alt="Product Thumb 3" />
                            <img class="sp-thumbnail img-fluid" src="{{asset ('assets/images/product_img3.jpg')}}" alt="Product Thumb 3" />
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-6 my-2">
                <div class="product_summary entry-summary">
                    <h1>HP – LaserJet Enterprise M455dn Color Laser Printer – White</h1>
                    <div class="stock pt-1">
                        <span class="badge border rounded-pill instock">In Stock</span>
                    </div>
                    <div class="product-price pt-2">
                        <p class="price">
                            <del><bdi><span class="woocommerce-Price-currencySymbol">$</span>599.99</bdi></del>
                            <ins><bdi><span class="woocommerce-Price-currencySymbol">$</span>590.99</bdi></ins>
                            <span class="sale-off fw-bold">2% OFF</span>
                        </p>
                        <!-- <p class="price">
                            <ins><bdi><span class="woocommerce-Price-currencySymbol">$</span>290.99</bdi></ins>
                            <span class="">-</span>
                            <ins><bdi><span class="woocommerce-Price-currencySymbol">$</span>590.99</bdi></ins>
                        </p> -->
                    </div>
                    <!-- <div class="short_desc pb-2">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id commodi eaque voluptatibus illo, exercitationem minus natus, doloremque amet similique in dolore non quae pariatur dolorum laboriosam qui dolores nesciunt rem!</p>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aut illo maxime accusamus tempora veritatis dicta aperiam.</p>
                    </div> -->
                    <form class="cart mb-3" action="" method="post">
                       

                        <div class="product-atc-group product-type-simple d-flex flex-wrap gap-3 align-items-end">
                            <div class="product-quantity">
                                <div class="quantity__label em-font-semibold text-start">Quantity:</div>
                                <div class="quantity">
                                    <span class="icon--minus qty-button">
                                        <svg aria-hidden="true" role="img" focusable="false" width="12" height="2" viewBox="0 0 12 2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.998 1.85689H6.85519H5.1409H-0.00195312V0.142604H5.1409L6.85519 0.142578L11.998 0.142604V1.85689Z"></path>
                                        </svg>
                                    </span>
                                    <input type="number" id="quantity" class="input-text qty" name="quantity" value="1" min="1" max="" step="1" placeholder="" inputmode="numeric" autocomplete="off">
                                    <span class="icon--plus qty-button">
                                        <svg aria-hidden="true" role="img" focusable="false" width="12" height="12" viewBox="0 0 12 12" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.998 6.85714H6.85519V12H5.1409V6.85714H-0.00195312V5.14286H5.1409V0H6.85519V5.14286H11.998V6.85714Z"></path>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <button type="submit" name="add-to-cart" class="single_add_to_cart_button btn btn-dark">Add to cart</button>
                            <div class="product_wishlist_btn">
                                <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Add to wishlist" data-tooltip_added="Remove from wishlist">
                                    <i class="fa-regular fa-heart"></i>
                                </a>
                            </div>
                        </div>
                    </form>

                    <div class="share_product mb-2 py-2">
                        <a href="#" class="d-inline-flex align-items-center gap-2">
                            <i class="fa-solid fa-share-nodes"></i> Share
                        </a>
                    </div>

                    <div class="product_meta">
                        <div class="sku_wrapper pb-1"><span class="fw-semibold">SKU:</span> <span class="sku">003</span></div>
                        <div class="posted_in">
                            <span class="fw-semibold">Category: </span>
                            <a href="#" rel="tag">Grocery</a>, <a href="#" rel="tag">Garments</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="vsipl_tabs pt-5">
            <div class="accordion" id="productTabs">
                <div class="accordion-item">
                    <h4 class="accordion-header accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#descriptionTab" aria-expanded="false" aria-controls="descriptionTab">Description</h4>
                    <div id="descriptionTab" class="accordion-collapse collapse" data-bs-parent="#productTabs">
                        <div class="accordion-body">
                            <p><strong>HP OfficeJet Pro 9110b Printer Specifications</strong></p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam minima quos explicabo reiciendis aspernatur soluta ex veniam sunt enim quod, nisi maxime perferendis distinctio consequuntur aperiam unde quasi quas ad.</p>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th><strong>Category</strong></th>
                                        <th><strong>Specification</strong></th>
                                    </tr>
                                    <tr>
                                        <td><strong>Functions</strong></td>
                                        <td>Print Only</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Print Speed (Black – ISO)</strong></td>
                                        <td>Up to 22 ppm</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Print Speed (Color – ISO)</strong></td>
                                        <td>Up to 18 ppm</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Print Speed (Draft)</strong></td>
                                        <td>Up to 32 ppm (Black &amp; Color)</td>
                                    </tr>
                                    <tr>
                                        <td><strong>First Page Out (Black/Color)</strong></td>
                                        <td>12 sec / 13 sec</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Resolution (Black/Color)</strong></td>
                                        <td>1200 x 1200 dpi / Up to 4800 x 1200 optimized dpi</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Print Technology</strong></td>
                                        <td>HP Thermal Inkjet</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Monthly Duty Cycle</strong></td>
                                        <td>Up to 25,000 pages</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Recommended Monthly Volume</strong></td>
                                        <td>Up to 1,500 pages</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Display</strong></td>
                                        <td>2.7″ Capacitive Touchscreen (CGD)</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Processor Speed</strong></td>
                                        <td>1.2 GHz</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Number of Cartridges</strong></td>
                                        <td>4 (Black, Cyan, Magenta, Yellow)</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Replacement Cartridges</strong></td>
                                        <td>HP 936 Black (~1,450 pages); Cyan/Magenta/Yellow (~800 pages each)</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Ink Type</strong></td>
                                        <td>Pigment-based (Black &amp; Color)</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Print Languages</strong></td>
                                        <td>HP PCL6, PCL5, HP PostScript, native PDF</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Automatic Paper Sensor</strong></td>
                                        <td>No</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Paper Trays (Standard/Max)</strong></td>
                                        <td>1 / 1</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Mobile Printing</strong></td>
                                        <td>Apple AirPrint, Wi-Fi Direct, Mopria certified</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Connectivity</strong></td>
                                        <td>Ethernet, USB 2.0 (host &amp; device), Dual-band Wi-Fi</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Security Features</strong></td>
                                        <td>SSL/TLS, WPA2/WPA3, EWS Password, Signed Firmware</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Memory</strong></td>
                                        <td>512 MB</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Printer Management Tools</strong></td>
                                        <td>HP WebJet Admin, Embedded Web Server, HP JetAdvantage, HP Smart U.P.D., HP Security Manager</td>
                                    </tr>
                                    <tr>
                                        <td><strong>System Requirements</strong></td>
                                        <td>Windows 10/11; macOS 11–15; 2 GB HDD, Internet</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Compatible OS</strong></td>
                                        <td>Windows 10/11/Server, macOS 11–15, Linux, Chrome OS</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Supported Protocols</strong></td>
                                        <td>IPv4/IPv6, DHCP, LPR/LPD, SNMP, IPP, Web Services, 802.1x Auth, etc.</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Input Capacity</strong></td>
                                        <td>250-sheet tray</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Output Capacity</strong></td>
                                        <td>60-sheet tray</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Duplex Printing</strong></td>
                                        <td>Automatic</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Envelope Capacity</strong></td>
                                        <td>Up to 30 envelopes</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Borderless Printing</strong></td>
                                        <td>Yes (photo paper only, up to 8.5 x 11 in)</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Media Sizes (Standard/Custom)</strong></td>
                                        <td>3 x 5 in to 8.5 x 14 in</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Media Types</strong></td>
                                        <td>Plain, Photo, Brochure, Glossy, Presentation, Tri-fold, Recycled, Thick Paper</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Media Weight Supported</strong></td>
                                        <td>16–28 lb (plain); 60–75 lb (photo); 20–24 lb (envelope); 90–110 lb (card)</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Faxing</strong></td>
                                        <td>❌ Not Supported</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Power Input</strong></td>
                                        <td>100–240 VAC, 50/60 Hz</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Power Consumption</strong></td>
                                        <td>3.49W (ready), 1.16W (sleep), 0.13W (off)</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Energy Efficiency</strong></td>
                                        <td>IT ECO Declaration, EPEAT® registered</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Operating Temp Range</strong></td>
                                        <td>41 to 104°F</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Software Included</strong></td>
                                        <td>HP Printer Software</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Warranty</strong></td>
                                        <td>One-Year Limited Warranty</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Dimensions (Min/Max)</strong></td>
                                        <td>17.28 x 13.48 x 7.7 in / 17.28 x 20.46 x 7.7 in</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Weight (Product/Package)</strong></td>
                                        <td>13.56 lb / 18.7 lb</td>
                                    </tr>
                                    <tr>
                                        <td><strong>In the Box</strong></td>
                                        <td>Printer, Setup Ink (Black, Cyan, Magenta, Yellow), Flyers, Power Cord, Setup &amp; Reference Guides</td>
                                    </tr>
                                    <tr>
                                        <td><strong>USB Cable Included</strong></td>
                                        <td>Region-dependent (AP-EM: Yes; Others: No)</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Sustainability</strong></td>
                                        <td>Recyclable via HP Planet Partners, Forest First Product</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Dynamic Security</strong></td>
                                        <td>Yes (Works only with new or reused HP chips; firmware updates may block non-HP chips)</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
               
                <div class="accordion-item">
                    <h4 class="accordion-header accordion-button" data-bs-toggle="collapse" data-bs-target="#reviewTab" aria-expanded="true" aria-controls="reviewTab">Reviews</h4>
                    <div id="reviewTab" class="accordion-collapse collapse show" data-bs-parent="#productTabs">
                        <div class="accordion-body">
                            <div id="reviews" class="d-flex flex-wrap">
                                <div class="product_rating">
                                    <h3>Customer Reviews</h3>
                                    <p class="noreviews opacity-75">No reviews yet.</p>
                                    <button class="form-review px-4 px-2 btn btn-outline-dark" type="button" data-bs-toggle="modal" data-bs-target="review-form">Write a review</button>
                                </div>
                                <div id="comments" class="flex-grow-1">
                                    <button class="form-review px-4 px-2 btn btn-outline-dark ms-auto d-none" type="button" data-bs-toggle="modal" data-bs-target="review-form">Write a review</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Slider Pro JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slider-pro/1.5.0/js/jquery.sliderPro.min.js"></script>
<!-- LightGallery JS -->
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/lightgallery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/plugins/zoom/lg-zoom.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/plugins/thumbnail/lg-thumbnail.min.js"></script>

<script>
    jQuery(document).ready(function($) {
        $('#product-gallery').sliderPro({
            width: '100%',
            height: 650,
            fade: true, // smooth fade transition
            arrows: true, // show next/prev arrows
            buttons: false, // hide small navigation bullets
            thumbnailsPosition: 'bottom', // thumbnails below main image
            thumbnailWidth: 153,
            thumbnailHeight: 153,
            thumbnailArrows: true, // show arrows for thumbnails
            touchSwipe: true, // enable touch gestures
            responsive: true,
            autoScaleLayers: true,
            imageScaleMode: 'contain', // keeps full image visible (no crop)
            shuffle: false, // optional: set true for random orderß
            autoplay: false // change to true if you want auto slide
        });

        // Initialize LightGallery on the same element
        lightGallery(document.getElementById('product-gallery'), {
            selector: '.sp-slide a', // targets only slide links
            thumbnail: true,
            zoom: true,
            download: false,
            actualSize: false,
            fullScreen: true
        });
    });
</script>
@endsection