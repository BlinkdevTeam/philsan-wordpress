<?php 
    $group = get_field('mission_section');
?>
<div class="mission-section custom-container py-[50px]">
    <div class="flex space-between">
        <div class="">
            <?php if (!empty($group['title'])) : ?>
                <h2 class="text-[34px] text-[#1F773A] font-[700]"><?php echo esc_html($group['title']) ?></h2>
            <?php endif; ?>
            <div class="pt-[10px]">
                <?php if (!empty($group['sub'])) : ?>
                    <div class="text-[24px] leading-[34px] flex flex-col gap-[20px] font-[300]"><?php echo ($group['sub']) ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<section class="bg-white py-16 px-6 md:px-20">
  <div class="max-w-5xl mx-auto">
    <h2 class="text-4xl font-bold text-center text-[#004d40] mb-12">
      Our History
    </h2>

    <div class="relative border-l-4 border-[#ffc107]">
      <!-- 1988 -->
      <div class="mb-10 ml-6">
        <div class="absolute w-6 h-6 bg-[#004d40] rounded-full -left-3 top-1.5"></div>
        <h3 class="text-xl font-semibold text-[#004d40]">1988 – Founding</h3>
        <p class="mt-2 text-gray-700 leading-relaxed">
          In January 1988, Dr. Placido F. Alcantara and fellow nutritionists 
          formed a breakfast club at the Mandarin Oriental Hotel, Makati. 
          By June 28, the group approved its constitution and by-laws, officially 
          creating the <strong>Philippine Society of Animal Nutritionists (PHILSAN)</strong>.
        </p>
      </div>

      <!-- 1989 -->
      <div class="mb-10 ml-6">
        <div class="absolute w-6 h-6 bg-[#004d40] rounded-full -left-3 top-1.5"></div>
        <h3 class="text-xl font-semibold text-[#004d40]">1989 – First Conventions</h3>
        <p class="mt-2 text-gray-700 leading-relaxed">
          PHILSAN organized its second seminar-convention with the theme 
          <em>"Animal Nutrition in the 90’s"</em> at the Manila Polo Club. 
          Membership expanded and new officers were elected.
        </p>
      </div>

      <!-- 1990 -->
      <div class="mb-10 ml-6">
        <div class="absolute w-6 h-6 bg-[#004d40] rounded-full -left-3 top-1.5"></div>
        <h3 class="text-xl font-semibold text-[#004d40]">1990 – Standards Published</h3>
        <p class="mt-2 text-gray-700 leading-relaxed">
          The <strong>PHILSAN Feed Reference Standards</strong> were published, 
          providing essential guidelines for livestock and poultry feed formulation 
          in the Philippines.
        </p>
      </div>

      <!-- 1996 -->
      <div class="mb-10 ml-6">
        <div class="absolute w-6 h-6 bg-[#004d40] rounded-full -left-3 top-1.5"></div>
        <h3 class="text-xl font-semibold text-[#004d40]">1996 – Second Edition</h3>
        <p class="mt-2 text-gray-700 leading-relaxed">
          Expanded to cover nutritional requirements for fish, ruminants, and ducks, 
          with updated listings of new feed ingredients.
        </p>
      </div>

      <!-- 2003 -->
      <div class="mb-10 ml-6">
        <div class="absolute w-6 h-6 bg-[#004d40] rounded-full -left-3 top-1.5"></div>
        <h3 class="text-xl font-semibold text-[#004d40]">2003 – Third Edition</h3>
        <p class="mt-2 text-gray-700 leading-relaxed">
          Published with ten chapters, including laws regulating the feed industry, 
          offering comprehensive guidance to animal nutritionists.
        </p>
      </div>

      <!-- 2009 -->
      <div class="mb-10 ml-6">
        <div class="absolute w-6 h-6 bg-[#004d40] rounded-full -left-3 top-1.5"></div>
        <h3 class="text-xl font-semibold text-[#004d40]">2009 – Newsletter</h3>
        <p class="mt-2 text-gray-700 leading-relaxed">
          Launched the <em>PHILSAN Feed & Nutrition Digest</em>, the official newsletter 
          highlighting major activities and achievements of the society.
        </p>
      </div>

      <!-- 2010 -->
      <div class="mb-10 ml-6">
        <div class="absolute w-6 h-6 bg-[#004d40] rounded-full -left-3 top-1.5"></div>
        <h3 class="text-xl font-semibold text-[#004d40]">2010 – Going Online</h3>
        <p class="mt-2 text-gray-700 leading-relaxed">
          The official PHILSAN website was launched in August 2010, bridging 
          the society to the online community.
        </p>
      </div>
    </div>
  </div>
</section>

