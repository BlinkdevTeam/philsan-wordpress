<?php
/*
 * Template Name: QR Code Download
 * Template Post Type: page
 */

get_header();

while (have_posts()) {
    the_post();
?>

<div class="bg-[#f1efe8] min-h-screen w-full flex items-center justify-center px-4 py-[60px] pt-[140px]">
    <div class="w-full max-w-[480px]">

        <!-- Loading state -->
        <div id="loading-panel" class="bg-white rounded-lg shadow-lg p-10 text-center">
            <div class="flex items-center justify-center mb-4">
                <div class="h-8 w-8 animate-spin rounded-full border-4 border-solid border-gray-200 border-t-[#16572A]"></div>
            </div>
            <p class="text-[13.5px] text-[#5f5e5a]">Loading your QR code…</p>
        </div>

        <!-- Error state -->
        <div id="error-panel" class="hidden bg-white rounded-lg shadow-lg p-10 text-center">
            <div class="w-[56px] h-[56px] rounded-full bg-[#FCEBEB] flex items-center justify-center mb-4 mx-auto">
                <i class="ti ti-link-off text-[26px] text-[#A32D2D]"></i>
            </div>
            <p class="text-[18px] font-[700] text-[#A32D2D] mb-2">Link invalid</p>
            <p id="error-message" class="text-[13.5px] text-[#5f5e5a] leading-[1.7]"></p>
        </div>

        <!-- QR code panel -->
        <div id="qr-panel" class="hidden bg-white rounded-lg shadow-lg overflow-hidden">
            <!-- Header -->
            <div class="bg-[#16572A] px-6 py-5">
                <p class="text-[11px] text-[#A9D4B4] uppercase tracking-widest mb-1">PHILSAN 39th Annual Convention</p>
                <p class="text-[18px] font-[700] text-white">Your Event QR Code</p>
            </div>

            <!-- Participant info -->
            <div class="px-6 pt-6 pb-2">
                <p class="text-[13px] text-[#5f5e5a] mb-1">Registered participant</p>
                <p id="participant-name" class="text-[20px] font-[700] text-[#16572A]"></p>
                <p id="participant-company" class="text-[13px] text-[#5f5e5a] mt-1"></p>
            </div>

            <!-- QR code -->
            <div class="flex flex-col items-center px-6 py-6">
                <div class="border-[2px] border-[#e5e3da] rounded-lg p-4 bg-white mb-4">
                    <div id="qr-canvas" style="width:260px; height:260px;"></div>
                </div>
                <p class="text-[12px] text-[#888780] text-center mb-5">
                    Present this QR code at the event entrance to check in.<br>
                    Do not share this code with others.
                </p>
                <button
                    id="download-btn"
                    class="w-full inline-flex items-center justify-center gap-2 py-[12px] px-[28px] bg-[#16572A] hover:bg-[#EDB221] text-white rounded-tl-[24px] rounded-br-[24px] text-[14px] font-[500] transition-colors"
                >
                    <i class="ti ti-download text-[16px]"></i>
                    Download QR code
                </button>
            </div>

            <div class="px-6 pb-6">
                <p class="text-[11.5px] text-[#888780] text-center leading-[1.6]">
                    Save this image to your phone or print it before the event.<br>
                    If you lose this link, contact PHILSAN to resend your QR code.
                </p>
            </div>
        </div>

    </div>
</div>

<!-- qrcode.js from CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

<script>
const SUPABASE_URL = 'https://pskballrwzdbovtylgjs.supabase.co';
const SUPABASE_KEY = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InBza2JhbGxyd3pkYm92dHlsZ2pzIiwicm9sZSI6ImFub24iLCJpYXQiOjE3ODE2MzU4MTAsImV4cCI6MjA5NzIxMTgxMH0.LhtBD_E8aEUHLI4UAFqQ5-3_iVqwOLYN5TklbCDDeIg';
const GET_PARTICIPANT_URL = `${SUPABASE_URL}/functions/v1/get-participant-by-token`;

function showError(message) {
    document.getElementById('loading-panel').classList.add('hidden');
    document.getElementById('error-panel').classList.remove('hidden');
    document.getElementById('error-message').textContent = message;
}

document.addEventListener('DOMContentLoaded', async () => {
    const params = new URLSearchParams(window.location.search);
    const token  = params.get('t');

    if (!token) {
        showError('No QR code token found in this link. Please use the link from your approval email.');
        return;
    }

    try {
        const res  = await fetch(GET_PARTICIPANT_URL, {
            method: 'POST',
            headers: { 'apikey': SUPABASE_KEY, 'Content-Type': 'application/json' },
            body: JSON.stringify({ token })
        });
        const data = await res.json();

        if (!res.ok) {
            showError(data.error || 'This link is invalid or your registration has not been approved yet.');
            return;
        }

        const p = data.participant;

        // Show QR panel
        document.getElementById('loading-panel').classList.add('hidden');
        document.getElementById('qr-panel').classList.remove('hidden');

        // Fill participant info
        document.getElementById('participant-name').textContent =
            `${p.first_name} ${p.last_name}`;
        document.getElementById('participant-company').textContent =
            p.company || '';

        // Generate QR code into the div
        const qrContainer = document.getElementById('qr-canvas');
        new QRCode(qrContainer, {
            text: p.ticket_token,
            width: 260,
            height: 260,
            colorDark: '#16572A',
            colorLight: '#FFFFFF',
            correctLevel: QRCode.CorrectLevel.H
        });

        // Download button — get the canvas QRCode.js created inside the div
        document.getElementById('download-btn').addEventListener('click', () => {
            const qrCanvas = qrContainer.querySelector('canvas');
            if (!qrCanvas) return;
            const link = document.createElement('a');
            link.download = `PHILSAN-QR-${p.first_name}-${p.last_name}.png`;
            link.href = qrCanvas.toDataURL('image/png');
            link.click();
        });

    } catch (err) {
        showError('Something went wrong. Please try again or contact PHILSAN for support.');
        console.error(err);
    }
});
</script>

<?php
}

get_footer();
?>