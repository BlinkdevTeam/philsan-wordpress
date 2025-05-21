<?php 

get_header(); 

    while (have_posts()) {
    the_post();
?>

<div class="w-[1080px]">
    <div class="flex w-[100%]">
        <div class="bg-[#F6F5F3] w-[50%] p-[50px] flex justify-center items-center">
            <div class="flex flex-col gap-[20px]">
                <h2 class="text-[38px]">Philsan</h2>
                <h1 class="text-[48px] font-bold">Philippine Society of Animal Nutritionists' 38ᵗʰ ANNUAL CONVENTION</h1>
                <p class="text-[18px]">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>
         <div class="w-[100%]">
            <div class="text-black flex flex-col justify-center">
                <div class="w-auto h-auto flex flex-col justify-center px-8 md:px-20 lg:px-24 py-12 rounded space-y-6 text-start">
                <div class="flex flex-col">
                    <p class="sub-bi-heading text-[#344054]">Your email</p>
                    <input
                        name="email"
                        type="email"
                        required
                        placeholder="Email address"
                        class="w-full p-3 border"
                    />
                </div>
                
                <div>
                    <button type="Verify Email" onClick={handleSubmit} class="hover:bg-[#32bd49] py-3 w-[148px] h-[60px] submit bg-[#959595] rounded-[8px] text-[#ffffff] cursor-pointer">Submit</button>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
        }

get_footer(); 

?>
