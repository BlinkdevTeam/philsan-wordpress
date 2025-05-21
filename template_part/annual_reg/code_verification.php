<form id="code-verification" class="text-black flex flex-col justify-center">
    <div class="w-auto h-auto flex flex-col justify-center px-8 md:px-20 lg:px-24 py-12 rounded space-y-6 text-start">
        <div class="flex flex-col">
            <p class="sub-bi-heading text-[#344054]">Your email</p>
            <input
                name="code"
                type="text"
                required
                placeholder="Enter 6-digit Code"
                class="w-full p-3 border"
            />
            <input type="hidden" name="code" id="code" />
        </div>
        <div>
            <button type="submit" class="hover:bg-[#32bd49] py-3 w-[148px] h-[60px] submit bg-[#959595] rounded-[8px] text-[#ffffff] cursor-pointer">Verify Code</button>
        </div>
    </div>
</form>