<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bintang Plafon PVC Group</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</head>
<body>
    <div class="header">
        <div class="header_top">
            <div class="nav_top">
                <div class="contact_nav">
                    <div class="contact_nav_box">
                        <iconify-icon icon="weui:location-outlined"></iconify-icon>
                        <p> Jl. Kedung Asem, Mekarmaya, Kec. Cilamaya Wetan, Karawang 41384</p>
                    </div>
                    <div class="contact_nav_box">
                        <iconify-icon icon="mdi-light:phone"></iconify-icon>
                        <a href="https://api.whatsapp.com/send?phone=6282325362169" target="blank_"><p>082325362169</p></a>
                    </div>
                    <div class="contact_nav_box">
                        <iconify-icon icon="ph:envelope-light"></iconify-icon>
                        <a href="mailto: ahmadagusindra@gmail.com" target="_blank"><p> ahmadagusindra@gmail.com</p></a>
                    </div>
                </div>
                <div class="sosmed_nav">
                    <p>Ikuti Kami di </p>
                    <div class="sosmed_nav_box">
                        @foreach($socials as $item) 
                            <a href="{{ $item->name ?? '#' }}" target="_blank" rel="noopener noreferrer">
                                <div>
                                    <iconify-icon icon="{{ $item->icon }}"></iconify-icon>
                                </div>
                            </a>
                        @endforeach
                    </div>


                </div>
            </div>
        </div>
        <div class="header_container">
            <div class="logo_header">
                <img src="images/logo_rizqita_second.png" alt="">
            </div>
            <button id="menuToggleButton" class="hamburger" onclick="popupMenuMobile()">
                <iconify-icon id="menuIcon" icon="radix-icons:hamburger-menu"></iconify-icon>
            </button>
            <div class="menu_header" id="menuMobilePopup">
                <ul>
                    <li><a href="#" onclick="popupMenuMobile()">Beranda</a></li>
                    <li><a href="#produk" onclick="popupMenuMobile()">Produk</a></li>
                    <li><a href="#tentang-kami" onclick="popupMenuMobile()">Tentang Kami</a></li>
                    <li><a href="#layanan" onclick="popupMenuMobile()">Layanan</a></li>
                    <li><a href="#hubungi" onclick="popupMenuMobile()">Hubungi Kami</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="section_1">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="section_1_text">
                        <h1>Distributor PVC Berkualitas</h1>
                        <p>Solusi Tepat Untuk Plafon  & Interior Rumah Anda</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="section_1_text">
                        <h1>Plafon PVC Terbaik</h1>
                        <p>Kualitas, Estetika, dan Ketahanan!</p>
                    </div>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        <img src="images/section_1_img.webp" alt="Bintang Plafon PVC Group" class="section_1_img">
    </div>
    <div class="section_2">
        <div class="section_2_content">
            <h1>Masih Bingung Mau <br/><font>Ganti plafon merk apa?</font></h1>
            <p>Rizqita Jaya Gemilang adalah <br/>
            Solusi Tepat Untuk Plafon  & Interior Rumah Anda</p>
        </div>
        @if($hotline)
            <a href="https://api.whatsapp.com/send?phone={{ $hotline->name }}">
                <div class="hotline_box">
                    <p>Hubungi hotline service <br/>
                    pada tombol kontak</p>
                    <img src="images/hotline.svg" alt="Hotline Image">
                </div>
            </a>
        @endif

        <img src="images/section_2_img.webp" alt="" class="section_2_img">
    </div>
    <div class="section_3">
        <div class="section_3_content">
            <img src="images/logo_rizqita_third.png" alt="" class="section_3_logo">
            <p>Keunggulan Produk:</p>
            <p>Kami percaya setiap ruangan berpotensi menciptakan suasana yang indah dan nyaman. Oleh karena itu, kami menawarkan rangkaian produk unggulan untuk memberikan sentuhan khusus pada ruangan Anda, menggabungkan kualitas, keindahan, dan inovasi.</p>
            <img src="images/section_3_icon.png" alt="" class="section_3_icon">
        </div>
        <div class="section_3_image">
            <img src="images/section_3_img.webp" alt="">
            <img src="images/section_3_material.webp" alt="" class="section_3_material">
        </div>
    </div>
    <div class="section_4">
        <div class="section_4_content">
            <img src="images/logo_rizqita_third.png" alt="">
            <p>Sebuah ornamen berperan penting bagi lampu hias ruangan. Ada bayak jenis dan model Ornamen, </br>
            Ornamen jenis ini didesain unik dan menarik sehingga cocok digunakan </br>
            sebagai penunjang penampilan interior ruangan Anda. ornamen akan memberikan 
            kesan mewah dan elegan sehingga cocok digunakan untuk kebutuhan komersial. 
            Pemasangan ornamen cukup mudah dan bisa digunakan untuk masa pakai yang lama.</p>
            <img src="images/section_3_icon.png" alt="" class="section_3_icon section_3_icon_sc">
        </div>
        <img src="images/ornamen_1.webp" alt="" class="ornamen_1">
        <img src="images/ornamen_2.webp" alt="" class="ornamen_2">
        <img src="images/ornamen_3.webp" alt="" class="ornamen_3">
    </div>
    <div class="section_5">
        <div class="section_5_content">
            <img src="images/logo_rizqita_third.png" alt="">
            <p>LIS PLAFON PVC</br>
            Plafon atau langit-langit adalah permukaan interior atas yang berhubungan </br>
            dengan bagian atas sebuah ruangan. Umumnya, </br>
            langit-langit bukan unsur struktural, </br>
            melainkan permukaan yang menutupi lantai struktur atap di atas. </br>
            Pada pemasangan plafoan,</br>
            biasanya dilengkapi dengan lis plafon </br>
            yang berfungsi sebagai penghubung antara permukaan plafon dan dinding
            yang saling menempel. Tanpa adanya lis plafon, 
            area plafon tidak hanya terlihat biasa saja 
            tapi juga akan mudah retak dan runtuh.
            </p>
            <img src="images/section_3_icon.png" alt="" class="section_3_icon section_3_icon_sc">
        </div>
        <img src="images/lis_ornamen.webp" alt="" class="lis_ornamen">
    </div>
    <div class="section_6">
        <div class="section_6_box" style="background-image:url(images/section_6_1.webp);">
            <img src="images/logo_rizqita_third.png" alt="">
        </div>
        <div class="section_6_box" style="background-image:url(images/section_6_2.webp);">
            <img src="images/logo_rizqita_third.png" alt="">
        </div>
        <div class="section_6_box" style="background-image:url(images/section_6_3.webp);">
            <img src="images/logo_rizqita_third.png" alt="">
        </div>
    </div>
    <div class="section_7">
        <h1>Rizqita Jaya Gemilang Pusat</h1>
        <p>Kami berkomitmen pada produk berkualitas tinggi yang memenuhi standar industri, didukung layanan pelanggan yang ramah dan profesional. Tim ahli kami siap membantu Anda memilih produk yang tepat, dengan dukungan purna jual untuk pemasangan, perawatan, dan konsultasi. </p>
        <p>Layanan pengiriman kami menjamin produk Anda sampai dengan aman dan tepat waktu, didukung jasa pemasangan oleh tim berpengalaman untuk pekerjaan yang cepat dan rapi.</p>
        <p>Kami bangga melayani Karawang dan sekitarnya, siap memberikan produk dan layanan terbaik untuk menciptakan ruangan yang indah dan nyaman bagi Anda. Untuk informasi lebih lanjut atau mengatur janji temu, silakan hubungi kami</p>
    </div>
    <div class="section_all">
        <div class="section_8">
            <div class="section_8_heading">
                <h1><div class="square"></div>Plafon PVC</h1>
                <a href="#produk">Lihat Semua</a>
            </div>
            <div class="section_8_layout">
                @foreach($products as $product)
                    <div class="section_8_box">
                        <div class="section_8_image">
                            <a href="#">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                            </a>
                        </div>
                        <button 
                            data-category="{{ $product->category->name }}" 
                            data-product="{{ $product->name }}" 
                            onclick="showWhatsAppModal(this)">Minta Penawaran</button>
                    </div>
                @endforeach
            </div>

            <!-- Popup Modal -->
            <div id="whatsappModal" class="popup_btn">
                <div class="overlay_modal" onclick="closeWhatsappModal()"></div>
                <div class="popup_btn_box">
                    <h2 class="">Silahkan Pilih Toko</h2>
                    <ul class="list_number" id="whatsappNumbersList">
                        @foreach($whatsapps as $whatsapp)
                            <li>
                                <a href="#" class="whatsapp-link" data-phone="{{ $whatsapp->name }}">
                                <button class="button-14" role="button">
                                <div class="button-14-top text">{{ $whatsapp->distributor }}</div>
                                <div class="button-14-bottom"></div>
                                <div class="button-14-base"></div>
                                </button>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="close_modal_produk">
                        <button onclick="closeWhatsappModal()" class=""><iconify-icon icon="iconamoon:close-duotone"></iconify-icon></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="section_8">
            <div class="section_8_heading">
                <h1><div class="square"></div>Ornamen PVC</h1>
                <a href="#produk">Lihat Semua</a>
            </div>
            <div class="section_8_layout">
                @foreach($productsOrnamen as $product)
                    <div class="section_8_box">
                        <div class="section_8_image">
                            <a href="#">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                            </a>
                        </div>
                        <button 
                            data-category="{{ $product->category->name }}" 
                            data-product="{{ $product->name }}" 
                            onclick="showWhatsAppModal(this)">Minta Penawaran</button>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="section_9">
            <h1>Peluang Kerjasama Dengan Rizqita Jaya Gemilang</h1>
            <p>Rizqita Jaya Gemilang telah menjalin kemitraan dengan distributor-distributor terpercaya di berbagai kota besar di Indonesia. </br>
                Kami menempatkan produk-produk unggulan sebagai prioritas, memastikan para mitra mendapatkan permintaan pasar yang stabil dan menguntungkan.</br>
                Dengan beragam produk yang selalu mengikuti perkembangan pasar, kami membantu mengembangkan usaha mitra-mitra kami,</br>
                memberikan akses kepada mereka pada produk-produk kekinian yang memiliki daya tarik tinggi.</br>
                Kami terus berkomitmen untuk meningkatkan mutu dan kualitas produk kami,</br>
                serta memastikan kecepatan pengiriman yang optimal guna mendukung peningkatan distribusi dan penjualan. </br>
                Pengiriman Barang ke distributor kami dijamin dalam kondisi yang rapi, aman, dan tepat waktu.</br>
                Jangan lewatkan peluang ini, Segera daftar menjadi bagian bintang plafon sekarang dan raih kesuksesan bersama kami.</p>
            <p>Join Distributor dan Informasi Lebih Lanjut: </br>www.rizqitajayagemilangpusat.com</p>
        </div>
        <div class="section_category">
            <a href="#">
                <div class="section_category_box" style="background-image:url(images/bg_category_1.webp)">
                    <h3>Plafon Pvc</h3>
                </div>
            </a>
            <a href="#">
                <div class="section_category_box" style="background-image:url(images/bg_category_2.webp)">
                    <h3>List Pvc</h3>
                </div>
            </a>
            <a href="#">
                <div class="section_category_box" style="background-image:url(images/bg_category_3.webp)">
                    <h3>Ornamen Pvc</h3>
                </div>
            </a>
            <a href="#">
                <div class="section_category_box" style="background-image:url(images/bg_category_4.webp)">
                    <h3>Fitting Ornamen Pvc</h3>
                </div>
            </a>
        </div>
        <div class="section_category_tab" id="produk">
            <div class="tab_header">
                <div class="tab_header_heading">
                    <iconify-icon icon="bxs:category-alt"></iconify-icon>
                    <h2>Kategori Produk</h2>
                </div>
                <div class="tab_container">
                    <div class="tab">
                        @foreach($categories as $category)
                            <button class="tablinks" onclick="openCity(event, '{{ $category->id }}')" id="defaultOpen">{{ $category->name }}</button>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="tab_layout">
                @foreach($categories as $category)
                    <div id="{{ $category->id }}" class="tabcontent" style="display:none">
                        <div>{!! $category->description !!}</div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="tab_catalog_layout">
            @foreach($categories as $category)
                <div class="tab_catalog_content" id="catalog_{{ $category->id }}">
                    <div class="section_8_layout" id="product-container-{{ $category->id }}">
                        @foreach($category->products->take(8) as $index => $product) <!-- Limit to first 8 products -->
                            <div class="section_8_box" data-index="{{ $index }}">
                                <div class="section_8_image">
                                    <a href="#">
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                                    </a>
                                </div>
                                <button 
                                data-category="{{ $product->category->name }}" 
                                data-product="{{ $product->name }}" 
                                onclick="showWhatsAppModal(this)">Minta Penawaran</button>
                            </div>
                        @endforeach
                    </div>

                    <!-- Check the total number of products in the category -->
                    @if($category->products->count() > 8)
                        <div class="pagination_layout">
                            <button class="load-more" data-category-id="{{ $category->id }}">Lihat Lainnya</button>
                        </div>
                    @endif

                    <div class="produk_keunggulan">
                        <div>{!! $category->excellence !!}</div>
                    </div>
                </div>
            @endforeach


        </div>
        <div class="section_about" id="tentang-kami">
            <div class="section_about_content">
                <img src="images/logo_rizqita.png" alt="">
                <h3>Tentang Kami</h3>
                <span>PT. Rizqita Jaya Gemilang Pusat</span>
                <p>Selamat datang di Rizqita Jaya Gemilang, distributor utama Plafon PVC dan Atap UPVC di Cilamaya Karawang. Kami berdedikasi untuk menyediakan solusi interior berkualitas tinggi untuk rumah dan bangunan komersial Anda. Dengan beragam pilihan produk PVC, kami siap memenuhi kebutuhan renovasi Anda dengan layanan yang tulus dan profesional.</p>
            </div>
            <div class="section_about_layout">
                <div class="section_about_box">
                    <img src="images/perusahaan.png" alt="">
                    <div class="section_about_box_content">
                        <h5>Bidang Perusahaan</h5>
                        <p>Plafon PVC, List PVC, Ornamen PVC, 
                        Fitting Ornamen</p>
                    </div>
                </div>
                <div class="section_about_box">
                    <img src="images/terdaftar.png" alt="">
                    <div class="section_about_box_content">
                        <h5>Tahun Terdaftar</h5>
                        <p>2017</p>
                    </div>
                </div>
                <div class="section_about_box">
                    <img src="images/karyawan.png" alt="">
                    <div class="section_about_box_content">
                        <h5>Jumlah Karyawan</h5>
                        <p>72</p>
                    </div>
                </div>
                <div class="section_about_box">
                    <img src="images/menjual.png" alt="">
                    <div class="section_about_box_content">
                        <h5>Kami Menjual</h5>
                        <p>Plafon PVC - Wall Panel WPC - Atap UPVC</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="section_visi_misi">
            <div class="section_visi_misi_content">
                <div class="section_visi_misi_box">
                    <h1>Visi Perusahaan</h1>
                    <p>Menjadi penyedia produk Plafon PVC berkualitas tinggi di Cilamaya secara khusus hingga Karawang pada umumnya, meningkatkan estetika dan kualitas interior rumah serta bangunan komersial.</p>
                </div>
                <div class="section_visi_misi_box">
                    <h1>Misi Perusahaan</h1>
                    <ul>
                        <li>Menawarkan produk Plafon PVC berkualitas dengan desain dan warna yang menarik.</li>
                        <li>Memberikan layanan pelanggan yang cepat, ramah, dan profesional.</li>
                        <li>Menyediakan jasa pemasangan yang handal dan berkualitas.</li>
                        <li>Membangun dan menjaga hubungan jangka panjang dengan pelanggan dan mitra.</li>
                        <li>Terus mengembangkan tim kami untuk menyediakan solusi terbaik.</li>
                    </ul>
                </div>
                <div class="section_visi_misi_box">
                    <h1>Value</h1>
                    <ul>
                        <li><b>Kualitas:</b> Hanya menyediakan produk PVC yang tahan lama dan estetis.</li>
                        <li><b>Keandalan:</b> Komitmen pada layanan yang andal dan tepat waktu.</li>
                        <li><b>Profesionalisme:</b> Tim ahli yang berpengalaman dan profesional.</li>
                        <li><b>Kepuasan Pelanggan:</b> Berusaha maksimal untuk kepuasan pelanggan.</li>
                        <li><b>Inovasi:</b> Berinovasi dan mengikuti perkembangan industri.</li>
                    </ul>
                </div>
            </div>
            <div class="section_visi_misi_image">
                <img src="images/logo_blue_hd.png" alt="">
            </div>
        </div>
        <div class="section_contact" id="hubungi">
            <div class="section_contact_maps">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15864.32039509025!2d107.579117!3d-6.253177!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69677e75ed6a39%3A0x9db335ba3e07ba88!2sDistributor%20Plafon%20PVC%20-%20Atap%20UPVC!5e0!3m2!1sid!2sid!4v1740471134470!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>            </div>
            <div class="section_contact_content">
                <h3>Kontak Perusahaan</h3>
                <div class="section_contact_alamat">
                    <h1>Rizqita Jaya Gemilang Pusat</h1>
                    <p>Jl. Kedung Asem Blok Mushollah No.75, RT.8/RW.4, Mekarmaya, Kec. Cilamaya Wetan, Karawang, Jawa Barat 41384</p>
                </div>
        
                @if($hotline)
                <a href="https://api.whatsapp.com/send?phone={{ $hotline->name }}" target="_blank">
                    <div class="section_contact_whatsapp">
                        <img src="images/hotline.svg" alt="">
                        <div class="section_contact_detail">
                            <p>Hubungi hotline service</br> pada tombol kontak</p>
                        </div>
                    </div>
                </a>
                @endif
                <div class="section_contact_logo">
                    <img src="images/logo_rizqita_third.png" alt="">
                </div>
            </div>
        </div>
        <div class="section_promotion" id="layanan">
            <div class="section_promotion_heading">
                <h1>Apa yang Kami tawarkan untuk Anda</h1>
                <p>Kami mempunyai Layanan Unggulan yang berkualitas yang selalu kami sediakan untuk 
                    memenuhi kebbutuhan anda. kami siap melayani anda dengan pelayanan yang terbaik </p>
            </div>
            <div class="section_promotion_layout">
                <div class="section_promotion_box">
                    <img src="images/promotion_1.png" alt="">
                    <h2>Mitra Distributor</h2>
                    <p>Kami memudahkan anda untuk bergabung menjadi mitra distributor dengan layanan profesional dan terpercaya</p>
                </div>
                <div class="section_promotion_box">
                    <img src="images/promotion_2.png" alt="">
                    <h2>Jasa Desain</h2>
                    <p>Kami menyediakan jasa desain yg bertujuan untuk branding iklan dan kebutuhan iklan untuk menunjang penjualan</p>
                </div>
                <div class="section_promotion_box">
                    <img src="images/promotion_3.png" alt="">
                    <h2>Renovasi Rumah</h2>
                    <p>Perbaikan dan pembaruan struktural serta estetika sebuah rumah untuk menciptakan lingkungan yang lebih fungsional</p>
                </div>
            </div>
        </div>
        <div class="section_promotion">
            <div class="section_promotion_heading">
                <h1>Hasil Pemasangan</h1>
                <p>Temukan berbagai model desain plafon rumah yang sesuai dengan selera anda</p>
            </div>
            <div class="section_promotion_layout section_promotion_layout_hasil">
                <div class="section_hasil">
                    <div class="section_image">
                        <img src="images/modern_img.webp" alt="">
                    </div>
                    <h1>Modern</h1>
                </div>
                <div class="section_hasil">
                    <div class="section_image">
                        <img src="images/minimalis_img.webp" alt="">
                    </div>
                    <h1>Minimalis</h1>
                </div>
                <div class="section_hasil">
                    <div class="section_image">
                        <img src="images/classic_img.webp" alt="">
                    </div>
                    <h1>Classic</h1>
                </div>
            </div>
        </div>
        <div class="section_cta">
            <div class="section_cta_box">
                <div class="section_cta_box_content">
                    <h1>Kini Rizqita Jaya Gemilang telah menjangkau ke beberapa kota</h1>
                    <div class="section_cta_box_btn">
                        <a href="#"><button>Selengkapnya</button></a>
                        <img src="images/logo_bintang.png" alt="">
                    </div>
                </div>
                <img src="images/cta_image.png" class="cta_image" alt="">
            </div>
        </div>
    </div>
    <div class="footer_layout">
        <div class="footer">
            <div class="logo_footer">
                <img src="images/logo_rizqita.png" alt="">
            </div>
            <div class="office">
                <h5>Head Office :</h5>
                <p>Jl. Kedung Asem Blok Mushollah No.75, RT.8/RW.4, Mekarmaya, Kec. Cilamaya Wetan, Karawang, Jawa Barat 41384
                </p>
                <a href="#">fax </br>rizqitajayagemilangpusat.com</a>
            </div>
            <div class="produk_footer">
                <h5>Produk</h5>
                <ul>
                    <li><a href="#">Rizqita Jaya Gemilang Interior</a></li>
                    <li><a href="#">Rizqita Jaya Gemilang Material</a></li>
                </ul>
            </div>
            <div class="produk_footer">
                <h5>Layanan</h5>
                <ul>
                    <li><a href="#">Mitra Distributor</a></li>
                    <li><a href="#">Jasa Desain</a></li>
                    <li><a href="#">Renovasi rumah</a></li>
                </ul>
            </div>
            <div class="contact_footer">
                <a href="#">
                    <div class="section_contact_whatsapp">
                        <img src="images/hotline.svg" alt="">
                        <div class="section_contact_detail">
                            <p>Hubungi hotline service</br> pada tombol kontak</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        function popupMenuMobile() {
            const popupMenuMobileVar = document.getElementById("menuMobilePopup");
            const menuIcon = document.getElementById("menuIcon");
            
            // Toggle kelas active-menuMobilePopup
            popupMenuMobileVar.classList.toggle("active-menuMobilePopup");
            
            // Ubah ikon berdasarkan kondisi active-menuMobilePopup
            if (popupMenuMobileVar.classList.contains("active-menuMobilePopup")) {
                menuIcon.setAttribute("icon", "radix-icons:cross-1"); // Ikon close
            } else {
                menuIcon.setAttribute("icon", "radix-icons:hamburger-menu"); // Ikon hamburger
            }
        }
    </script>
    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tabCatalogContent, tablinks;

            // Menghilangkan semua tabcontent
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Menghilangkan semua tab_catalog_content
            tabCatalogContent = document.getElementsByClassName("tab_catalog_content");
            for (i = 0; i < tabCatalogContent.length; i++) {
                tabCatalogContent[i].style.display = "none";
            }

            // Menghapus kelas 'active' dari semua tablinks
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            // Menampilkan tabcontent dan tab_catalog_content yang dipilih
            document.getElementById(cityName).style.display = "flex";
            document.querySelector('.tab_catalog_content#catalog_' + cityName).style.display = "block";


            // Menambahkan kelas 'active' pada tab yang diklik
            evt.currentTarget.className += " active";
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();

    </script>
    <script>
        // Add active class to the current button (highlight it)
        var header = document.getElementById("myDIV");
        var btns = header.getElementsByClassName("btn_pagination");
        for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
        var current = document.getElementsByClassName("active_pagination");
        current[0].className = current[0].className.replace(" active_pagination", "");
        this.className += " active_pagination";
        });
        }
    </script>
    <script>
        var swiper = new Swiper(".mySwiper", {
        loop:true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        });
    </script>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.load-more').forEach(button => {
            button.addEventListener('click', function() {
                const categoryId = this.dataset.categoryId;
                const productContainer = document.getElementById(`product-container-${categoryId}`);
                const currentProducts = productContainer.querySelectorAll('.section_8_box').length;

                // Fetch all categories and products data
                const allProducts = @json($categories->map(function($category) {
                    return [
                        'id' => $category->id,
                        'products' => $category->products->toArray() // Convert to array for JavaScript
                    ];
                }));

                const category = allProducts.find(cat => cat.id == categoryId);

                // Check if products exist for the category
                if (!category || !category.products) {
                    alert('No products found for this category.');
                    return;
                }

                // Get the next set of products to load
                const nextProducts = category.products.slice(currentProducts, currentProducts + 8);

                if (nextProducts.length === 0) {
                    alert('No more products to load');
                    return;
                }

                // Append new products to the container
                nextProducts.forEach(product => {
                    const productBox = document.createElement('div');
                    productBox.classList.add('section_8_box');
                    
                    productBox.innerHTML = `
                        <div class="section_8_image">
                            <a href="#">
                                <img src="{{ asset('storage') }}/${product.image}" alt="${product.name}">
                            </a>
                        </div>
                        <button 
                            data-category="${product.category.name}" 
                            data-product="${product.name}" 
                            onclick="showWhatsAppModal(this)">
                            Minta Penawaran
                        </button>
                    `;
                    
                    productContainer.appendChild(productBox);
                });
            });
        });
    });

    // Function to open WhatsApp modal with product details
    function showWhatsAppModal(button) {
        const categoryName = button.getAttribute('data-category');
        const productName = button.getAttribute('data-product');

        const whatsappLinks = document.querySelectorAll('.whatsapp-link');
        whatsappLinks.forEach(link => {
            const phoneNumber = link.getAttribute('data-phone');
            const message = encodeURIComponent(
                `Halo, saya ingin melakukan penawaran untuk produk ${categoryName} dengan nama ${productName}. Mohon info lebih lanjut mengenai harga dan ketersediaan. Terima kasih.`
            );
            link.setAttribute('href', `https://api.whatsapp.com/send?phone=${phoneNumber}&text=${message}`);
        });

        // Display the WhatsApp modal
        document.getElementById('whatsappModal').classList.add('active');
    }

    function closeWhatsappModal() {
        document.getElementById('whatsappModal').classList.remove('active');
    }
</script>

<script>
    function showWhatsAppModal(button) {
        // Get the category and product names from the button data attributes
        const categoryName = button.getAttribute('data-category');
        const productName = button.getAttribute('data-product');

        // Update WhatsApp links in the modal
        const whatsappListItems = document.querySelectorAll('.whatsapp-link');
        whatsappListItems.forEach(link => {
            const phoneNumber = link.getAttribute('data-phone');
            const message = encodeURIComponent(`Halo, saya ingin melakukan penawaran untuk produk ${categoryName} dengan nama ${productName}. Mohon info lebih lanjut mengenai harga dan ketersediaan. Terima kasih.`);
            link.setAttribute('href', `https://api.whatsapp.com/send?phone=${phoneNumber}&text=${message}`);
        });

        // Show the modal
        document.getElementById('whatsappModal').classList.add('active');
    }

    function closeWhatsappModal() {
        document.getElementById('whatsappModal').classList.remove('active');
    }
</script>




</body>
</html>