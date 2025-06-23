<div class="flex flex-col pt-[12px]">
    <p class="sub-bi-heading text-[#344054]">Are you a PHILSAN Member?</p>
    <div class="flex gap-[20px]">
        <div>
            <input class="border-[1px] border-[#339544]" type="radio" id="member_regular" name="membership" value="regular">
            <label for="member_regular">Regular</label>
        </div>
        <div>
            <input class="border-[1px] border-[#339544]" type="radio" id="member_associate" name="membership" value="associate">
            <label for="member_associate">Associate</label>
        </div>
        <div>
            <input class="border-[1px] border-[#339544]" type="radio" id="member_donor" name="membership" value="Donor">
            <label for="member_donor">Donor</label>
        </div>
        <div>
            <input class="border-[1px] border-[#339544]" type="radio" id="non_member" name="membership" value="non_member" required>
            <label for="non_member">Not a member</label>
        </div>
    </div>
</div>

<!-- Souvenir Program -->
<div class="flex flex-col pt-[12px]">
    <p class="sub-bi-heading text-[#344054]">Do wish to get a souvenir program copy?</p>
    <div class="flex gap-[20px]">
        <div class="w-[33.3%]">
            <input class="border-[1px] border-[#339544]" type="radio" id="sv_digital" name="souvenir" value="digital">
            <label for="sv_digital">No</label>
        </div>
        <div class="w-[33.3%]">
            <input class="border-[1px] border-[#339544]" type="radio" id="sv_printed" name="souvenir" value="printed" required>
            <label for="sv_printed">Printed (First 300 only)</label>
        </div>
        <div class="w-[33.3%]">
            <input class="border-[1px] border-[#339544]" type="radio" id="sv_digital" name="souvenir" value="digital">
            <label for="sv_digital">Digital Copy in USB drive (limited slots only)</label>
        </div>
    </div>
</div>

<!-- Certificate of Attendance -->
<div class="flex flex-col pt-[12px]">
    <p class="sub-bi-heading text-[#344054]">Do you need a Certificate of Attendance?</p>
    <p class="sub-bi-heading text-[#344054 italic font-[300]">Your name, as entered during registration, will appear on the certificate.</p>
    <div class="flex gap-[20px]">
        <div>
            <input type="radio" id="cert_yes" name="certificate_needed" value="yes" required>
            <label for="cert_yes">Yes</label>
        </div>
        <div>
            <input type="radio" id="cert_no" name="certificate_needed" value="no">
            <label for="cert_no">No</label>
        </div>
    </div>
</div>

<!-- Sponsored Registration -->
<!-- <div class="flex flex-col">
    <p class="sub-bi-heading text-[#344054]">Sponsored Registration?</p>
    <div class="flex gap-[20px]">
        <div>
            <input type="radio" id="sponsored_yes" name="sponsored" value="yes" required>
            <label for="sponsored_yes">Yes</label>
        </div>
        <div>
            <input type="radio" id="sponsored_no" name="sponsored" value="no">
            <label for="sponsored_no">No</label>
        </div>
    </div>
</div> -->