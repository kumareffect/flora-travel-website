<?php 
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
include("include/path.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <link rel="stylesheet"
          href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
          crossorigin="anonymous">
    <link rel="stylesheet" href="css/index_styles.css" />
    <title>Floria Travel Website | A Meeting point for amateurs of green Tourism</title>
    
    <style>
      #header {
        z-index: 999;
      }

      .dropdown {
        position: relative;
        display: inline-block;
      }

      .dropdown-menu {
        display: none; /* Hide by default */
        position: fixed;
        background-color: white;
        box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
        list-style: none;
        padding: 10px;
        z-index: 999;
      }

      .dropdown-menu li {
        margin: 10px 0;
      }

      .dropdown-menu li a {
        color: black;
        text-decoration: none;
        z-index: 999;
      }

      .dropdown-menu li a:hover {
        background-color: #ddd;
      }

      /* Show dropdown on hover */
      .dropdown:hover .dropdown-menu {
        display: block;
      }

      /* Animation for destination cards */
      .destination__card {
        transition: transform 0.3s;
      }
      
      .destination__card:hover {
        transform: scale(1.05);
      }

      /* Zoom effect on ratings */
      .client__rating span {
        display: inline-block;
        transition: transform 0.3s;
      }

      .client__rating span:hover {
        transform: scale(1.3);
      }

      /* Swiper styling */
      .swiper {
        width: 100%;
        height: 300px;
      }

      .swiper-slide {
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .client__card {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      }
      
    </style>
  </head>
  <body>
  <?php include(ROOT_PATH . "/../app/includes/indexHeader.php"); ?>

    <header id="home">
      <div class="header__container">
        <div class="header__content">
          <p>ELEVATE YOUR ENTHUSIASM FOR NATURE</p>
          <h1>Experience The Magic Of Nature!</h1>
          <div class="header__btns">
            <button onclick="location.href='#booking'" class="btn">Book A Trip Now</button>
            <a href="#">
              <span><i class="ri-play-circle-fill"></i></span>
            </a>
          </div>
        </div>
        <div class="header__image">
          <img src="assets/hibiscus.png" alt="header" class="hibiscus-animated"/>
        </div>
      </div>
    </header>

    <section class="section__container destination__container" id="about">
      <h2 class="section__header">Popular Destination</h2>
      <p class="section__description">
        Discover the Most Loved Destinations Around Mauritius.
      </p>
      <div class="destination__grid">
        <div class="destination__card">
          <img src="assets/Hiking.jpg" alt="destination" />
          <div class="destination__card__details">
            <div>
              <h4>Hiking</h4>
              <p>Pieter Both Mountain</p>
            </div>
            <div class="destination__rating">
              <span><i class="ri-star-fill"></i></span>
              4.7
            </div>
          </div>
        </div>
        <div class="destination__card">
          <img src="assets/Morne.jpg" alt="destination" />
          <div class="destination__card__details">
            <div>
              <h4>Beaches</h4>
              <p>Le Morne</p>
            </div>
            <div class="destination__rating">
              <span><i class="ri-star-fill"></i></span>
              4.5
            </div>
          </div>
        </div>
        <div class="destination__card">
          <img src="assets/1.jpg" alt="destination" />
          <div class="destination__card__details">
            <div>
              <h4>Yoga</h4>
              <p>In Nature</p>
            </div>
            <div class="destination__rating">
              <span><i class="ri-star-fill"></i></span>
              4.8
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section__container journey__container" id="blog">
      <h2 class="section__header">Journey To Explore Nature and Maintain Health!</h2>
      <p class="section__description">
        Effortless Planning for Your Next Adventure
      </p>
      <div class="journey__grid">
        <div class="journey__card">
          <div class="journey__card__bg">
            <span><i class="ri-bookmark-3-line"></i></span>
            <h4>Seamless Booking Process</h4>
          </div>
          <div class="journey__card__content">
            <span><i class="ri-bookmark-3-line"></i></span>
            <h4>Easy Reservations, One Click Away</h4>
            <p>
              Everything you need is available at your fingertips, making travel
              planning effortless.
            </p>
          </div>
        </div>
        <div class="journey__card">
          <div class="journey__card__bg">
            <span><i class="ri-landscape-fill"></i></span>
            <h4>Tailored Itineraries</h4>
          </div>
          <div class="journey__card__content">
            <span><i class="ri-landscape-fill"></i></span>
            <h4>Customized Plans Just for You</h4>
            <p>
              Enjoy personalized travel plans designed to match your preferences
              and interests. Whether you seek adventure or cultural immersion,
              our tailored itineraries ensure your journey is uniquely yours.
            </p>
          </div>
        </div>
        <div class="journey__card">
          <div class="journey__card__bg">
            <span><i class="ri-map-2-line"></i></span>
            <h4>Expert Local Insights</h4>
          </div>
          <div class="journey__card__content">
            <span><i class="ri-map-2-line"></i></span>
            <h4>Insider Tips and Recommendations</h4>
            <p>
              We provide curated recommendations for dining, sightseeing, and
              hidden gems, so you can experience each destination like a local.
            </p>
          </div>
        </div>
      </div>
    </section>
    

    <section class="section__container showcase__container" id="booking">
      <div class="showcase__image">
        <img src="assets/joy.jpg" alt="showcase" />
      </div>
      <div class="showcase__content">
        <h4>Floria Travel - Each booking has $10 kept aside for contributing for restoring Nature</h4>
        
        <p>Floria Travel is dedicated to preserving the natural world through sustainable tourism. For every trip booked, $10 goes toward reforestation efforts, helping to restore forests affected by deforestation and promote biodiversity.
        Our community offers eco-friendly travel options and connects like-minded individuals committed to environmental stewardship. We keep our members informed about the impact of their contributions, including the number of trees planted and ongoing reforestation projects.

        Join us in experiencing the natural wonders of Mauritius while actively protecting them for future generations. With every trip, you contribute to the fight against deforestation and the preservation of our natural reserves.</p>
        
        <div class="showcase__btn">
          <button onclick="location.href='booking'" class="btn">
            Book A Trip Now
            <span><i class="ri-arrow-right-line"></i></span>
          </button>
        </div>
      </div>
    </section>

    <section class="section__container client__container">
      <h2 class="section__header">Loved By Over Thousand Travelers</h2>
      <p class="section__description">
        Discover the stories of wanderlust and cherished memories through the eyes of our valued clients.
      </p>
      <section class="section__container banner__container">
      <div class="banner__card">
        <h4>10+</h4>
        <p>Years Experience</p>
      </div>
      <div class="banner__card">
        <h4>12K</h4>
        <p>Happy Clients</p>
      </div>
      <div class="banner__card">
        <h4>4.8</h4>
        <p>Overall Ratings</p>
      </div>
    </section>
    <h2 class="section__header">Testimonials from our old members!</h2>
      <div class="swiper">
        <div class="swiper-wrapper">
      
          <div class="swiper-slide">
            <div class="client__card">
              <div class="client__content">
                <div class="client__rating">
                  <span><i class="ri-star-fill"></i></span>
                  <span><i class="ri-star-fill"></i></span>
                  <span><i class="ri-star-fill"></i></span>
                  <span><i class="ri-star-fill"></i></span>
                  <span><i class="ri-star-fill"></i></span>
                </div>
               
                <p>
                  Floria has completely transformed my travel experience. The breathtaking locations, professional service, and commitment to sustainability made my trip unforgettable.
                </p>
                
              </div>
             
              <div class="client__details">
                <img src="assets/client-1.jpg" alt="client" />
                <div>
                  <h4>John Adams</h4>
                  <h5>Travel Blogger</h5>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="client__card">
              <div class="client__content">
                <div class="client__rating">
                  <span><i class="ri-star-fill"></i></span>
                  <span><i class="ri-star-fill"></i></span>
                  <span><i class="ri-star-fill"></i></span>
                  <span><i class="ri-star-fill"></i></span>
                  <span><i class="ri-star-fill"></i></span>
                </div>
                <p>
                  I can't recommend Floria Travel enough! Their attention to detail and love for nature shines through in every aspect of the trip.
                </p>
              </div>
              <div class="client__details">
                <img src="assets/client-2.jpg" alt="client" />
                <div>
                  <h4>Sarah Lee</h4>
                  <h5>Nature Enthusiast</h5>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="client__card">
              <div class="client__content">
                <div class="client__rating">
                  <span><i class="ri-star-fill"></i></span>
                  <span><i class="ri-star-fill"></i></span>
                  <span><i class="ri-star-fill"></i></span>
                  <span><i class="ri-star-fill"></i></span>
                  <span><i class="ri-star-fill"></i></span>
                </div>
                <p>
                  A truly amazing experience. Floria Travel made every moment memorable, from the breathtaking views to the incredible service.
                </p>
              </div>
              <div class="client__details">
                <img src="assets/client-3.jpg" alt="client" />
                <div>
                  <h4>Michael Johnson</h4>
                  <h5>Adventure Seeker</h5>
                </div>
              </div>
            </div>
          </div>
          <!-- Add more slides as needed -->
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </section>

    <?php include(ROOT_PATH . "/../app/includes/indexFooter.php"); ?>

    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
      
      const swiper = new Swiper('.swiper', {
          loop: true, 
          pagination: {
              el: '.swiper-pagination',
              clickable: true,
          },
          navigation: {
              nextEl: '.swiper-button-next',
              prevEl: '.swiper-button-prev',
          },
          autoplay: {
              delay: 5000, 
          },
      });
    </script>
  </body>
</html>
