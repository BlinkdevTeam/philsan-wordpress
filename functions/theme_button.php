<?php
function theme_button($label, $url) {
    return '<a href="' . esc_url($url) . '" class="bg-[#ffc200] px-[20px] py-[10px] text-[#ffffff] inline-flex items-center gap-[10px] rounded-tl-[80px] rounded-br-[80px] hover:bg-[#e6ae00] transition">'
        . esc_html($label) .
        '<svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 7H17M17 7L11 1M17 7L11 13" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </a>';
}
