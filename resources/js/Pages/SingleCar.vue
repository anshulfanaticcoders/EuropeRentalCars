<script setup lang="ts">
import Breadcrumb from '@/Components/Breadcrumb.vue';
import ImageGallery from '@/Components/SingleCarPageComponents/ImageGallery.vue';
import ShareIcon  from '../../assets/ShareNetwork.svg';
import  Heart  from '../../assets/Heart.svg';
import  carIcon  from '../../assets/carIcon.svg';
import  walkIcon  from '../../assets/walking.svg';
import  mileageIcon  from '../../assets/mileageIcon.svg';
import  pickupLocationIcon  from '../../assets/pickupLocationIcon.svg';
import  returnLocationIcon  from '../../assets/returnLocationIcon.svg';
import pencilIcon from '../../assets/Pencil.svg'
import partnersIcon from '../../assets/partners.svg'
import infoIcon from '../../assets/WarningCircle.svg'
import {Link } from "@inertiajs/vue3";
import Faq from '@/Components/Faq.vue';
</script>

<template>
    <main>
    <section>
        <div class="container py-customVerticalSpacing">
            <Breadcrumb/>
            <div class="flex justify-between mt-[4rem]">
                <div class="column w-[50%]">
                    <div class="flex gap-5 items-center mb-5">
                        <h4>Hyundai Creata</h4>
                        <span class="bg-[#f5f5f5] inline-block px-8 py-2 text-center rounded-[40px]">SUV</span>
                    </div>
                    <div class="flex gap-5 items-center text-[1.25rem]">
                        <div class="car_ratings">5(1)</div>
                        <div class="dot_seperator">
                            <strong>.</strong>
                        </div>
                        <div class="car_location"><span>Saint-Victor-en-Marche (23000), France</span></div>
                    </div>

                    <div class="gallery w-full mt-[4rem]">
                     <ImageGallery/>
                    </div>

                    <div class="column mt-[4rem] flex flex-col gap-10">
                        <span class="text-[2rem] font-medium">Car Overview</span>
                        <div class="overview rounded-[12px] border-[1px] border-[#153B4F] p-5 grid grid-cols-3">
                          <div class="col">
                            <span class="">Make Year</span>
                            <h5 class="text-[1.25rem] font-medium">April 2024</h5>
                          </div>
                          <div class="col">
                            <span class="">Registration Year</span>
                            <h5 class="text-[1.25rem] font-medium">Oct 2024</h5>
                          </div>
                          <div class="col">
                            <span class="">Fuel Type</span>
                            <h5 class="text-[1.25rem] font-medium">Disel</h5>
                          </div>
                          <div class="col">
                            <span class="">Make Driven</span>
                            <h5 class="text-[1.25rem] font-medium">11K km</h5>
                          </div>
                          <div class="col">
                            <span class="">Transmission</span>
                            <h5 class="text-[1.25rem] font-medium">Automatic</h5>
                          </div>
                          <div class="col">
                            <span class="">Insurance Validity</span>
                            <h5 class="text-[1.25rem] font-medium">Oct 2025</h5>
                          </div>
                          <div class="col">
                            <span class="">Car Location</span>
                            <h5 class="text-[1.25rem] font-medium">London</h5>
                          </div>
                         </div>
                    </div>

                    <div class="features mt-[3rem]">
                        <span class="text-[2rem] font-medium">Features</span>
                        <div class="grid grid-cols-4 mt-[2rem]">
                        <div class="col"><img src="" alt=""></div>
                        </div>
                    </div>

                </div>
                <div class="column w-[40%]">
                    <div class="rounded-[12px] border-[1px] border-[#153B4F] p-5 sticky top-[153px]">
                        <div class="flex items-center justify-between gap-3">
                            <h4>Hyundai Creata</h4>
                            <span class="bg-[#f5f5f5] inline-block px-8 py-2 text-center rounded-[40px]">SUV</span>
                            <div class="icons flex items-center gap-3">
                                <Link href="" class="w-full"><img :src="ShareIcon" alt=""></Link>
                                <Link href="" class="w-full"><img :src="Heart" alt=""></Link>
                            </div>
                        </div>
                        <div class=""><span>Hosted by <span class="vendorName uppercase">YASMIN SULTANA</span></span></div>
                        <div class="car_short_info mt-[1rem] flex gap-3">
                            <img :src="carIcon" alt="">
                            <div class="features"><span class="text-[1.15rem]">Manual . Diesel . 5 Seats</span></div>
                        </div>
                        <div class="extra_details flex gap-5 mt-[1rem]">
                            <div class="col flex gap-3"><img :src="walkIcon" alt=""><span class="text-[1.15rem]">9.3 KM Away</span></div>
                            <div class="col flex gap-3"><img :src="mileageIcon" alt=""><span class="text-[1.15rem]">100km/d</span></div>
                        </div>

                        <div class="ratings"></div>

                        <div class="location mt-[2rem]">
                            <span class="text-[1.5rem] font-medium mb-[1rem] inline-block">Location</span>
                            <div class="col flex items-start gap-4">
                              <img :src="pickupLocationIcon" alt="">
                              <div class="flex flex-col gap-1"><span class="text-[1.25rem] text-medium">Zaragoza Railway Station, Dubai</span><span class="">20 Nov 2023, 02:30 PM</span></div>
                            </div>
                            <div class="col flex items-start gap-4 mt-[2.5rem]">
                              <img :src="returnLocationIcon" alt="">
                              <div class="flex flex-col gap-1"><span class="text-[1.25rem] text-medium">Zaragoza Railway Station, Dubai</span><span class="">20 Nov 2023, 02:30 PM</span></div>
                            </div>

                            <div class="edit mt-[1rem] border-b-[1px] border-[#2B2B2B] pb-[2rem]">
                                <button class="bg-[#153B4F1A] px-6 py-2 flex items-center gap-2 border-[1px] border-customPrimaryColor rounded-[84px]">Edit <img :src="pencilIcon" alt=""></button>
                            </div>

                            <div class="pricing py-5">
                                <div class="column flex items-center justify-between">
                                    <span class="text-[1.25rem]">Total Price</span>
                                    <div>
                                    <span class="text-customPrimaryColor text-[1.875rem] font-medium">€150</span><span>/day</span>
                                    <br>
                                    <span class="flex gap-3">incl. VAT <img :src="infoIcon" alt=""></span>
                                    </div>
                                </div>
                                <div class="column mt-[2rem]">
                                    <button class="button-primary p-5 w-full">
                                       Proceed to Pay
                                    </button>
                                </div>
                                <div class="column text-center mt-[2rem] flex flex-col justify-center gap-5">
                                    <p>Guaranteed safe & secure checkout</p>
                                    <img :src="partnersIcon" alt="">
                                </div>
                            </div>
                            
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="py-customVerticalSpacing">
        <Faq/>
    </section>
    </main>
</template>

<style>
.overview .col:not(:last-child){
    border-bottom: 1px solid #2B2B2B;
}
.overview .col{
    padding: 2rem;
}
</style>