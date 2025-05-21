<?php
// get_header();

// <div class="w-full max-w-screen overflow-x-hidden min-h-screen flex flex-col justify-start items-center px-4 py-8">
//     get_template_part('front-page/hero-section');
//     get_template_part('front-page/about-section');
//     get_template_part('front-page/mission-section');
//     get_template_part('front-page/event-section');
// </div>

// get_footer();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Coming Soon</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />

  <!-- Google Fonts: Oswald -->
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@600&display=swap" rel="stylesheet" />

  <style>
    /* Custom color */
    .text-custom-green {
      color: #339544;
    }

    /* Oswald bold, large font size, responsive */
    .oswald-bold-70 {
      font-family: 'Oswald', sans-serif;
      font-weight: 700;
      font-size: 70px;
      line-height: 1.1;
    }
    @media (max-width: 768px) {
      .oswald-bold-70 {
        font-size: 48px;
      }
    }
    @media (max-width: 480px) {
      .oswald-bold-70 {
        font-size: 36px;
      }
    }

    /* Underline below Coming Soon, responsive width */
    .coming-soon-underline {
      width: 211px;
      max-width: 60vw;
      height: 4px;
      background-color: #339544;
      margin-bottom: 1.5rem;
      border-radius: 20px;
      margin-top: 24px;
    }

    /* New paragraph style, responsive font size */
    .source-sans-semibold-32 {
      font-family: 'Source Sans Pro', sans-serif;
      font-weight: 600;
      font-size: 32px;
      line-height: 1.3;
      color: #535353; 
      margin-bottom: 2rem;
      max-width: 600px;
    }
    @media (max-width: 768px) {
      .source-sans-semibold-32 {
        font-size: 24px;
        max-width: 90vw;
      }
    }
    @media (max-width: 480px) {
      .source-sans-semibold-32 {
        font-size: 18px;
      }
    }

    /* Footer styles */
    footer {
      font-family: 'Inter Display', sans-serif;
      font-weight: 400;
      font-size: 16px;
      color: #4E4E4F; 
      text-align: center;
      padding: 1.5rem 1rem;
    }
    footer a {
      font-weight: 600;
      text-decoration: underline;
      color: #4E4E4F; 
    }
    footer a:hover {
      color: #4E4E4F; 
    }

    /* Make overlay not block clicks */
    .background-overlay {
      pointer-events: none;
    }

    /* Responsive logo */
    header img {
      max-height: 4rem; /* 64px */
      width: auto;
    }
    @media (max-width: 480px) {
      header img {
        max-height: 3rem; /* 48px */
      }
    }
  </style>
</head>
<body
  class="relative bg-cover bg-center bg-no-repeat min-h-screen flex flex-col justify-between"
  style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/17580_1.png');"
>

  <!-- Optional Background Overlay -->
  <div class="absolute inset-0 bg-white bg-opacity-70 z-0 background-overlay"></div>

  <!-- Logo at the top -->
  <header class="relative z-10 w-full text-center py-6 px-4">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/PHILSAN_LOGO.png" alt="Logo" class="mx-auto" />
  </header>

  <!-- Main Content -->
  <main class="relative z-10 flex-grow flex flex-col justify-center items-center text-center px-6 sm:px-10">
    <h1 class="oswald-bold-70 text-custom-green mb-2">Coming Soon</h1>
    <div class="coming-soon-underline"></div>
    <p class="source-sans-semibold-32">
        The website is currently in development <br/>and will be launching soon!
    </p>
    <div class="animate-bounce">
      <svg class="w-8 h-8 text-custom-green" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 19V6m0 0L5 13m7-7l7 7" />
      </svg>
    </div>
  </main>

  <!-- Footer -->
  <footer>
    PHILSAN © 2025. All rights reserved. <br />
    <a href="https://blinkcreativestudio.com" target="_blank" rel="noopener noreferrer">
      Powered by BLINK CREATIVE STUDIO
    </a>.
  </footer>

</body>
</html>
