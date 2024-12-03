<script setup lang="ts">
import { Link } from "@inertiajs/vue3";
import Heart from "../../assets/Heart.svg";
import CardCarImage from "../../assets/dummyCarImaage.png";
import carIcon from "../../assets/carIcon.svg";
import walkIcon from "../../assets/walking.svg";
import mileageIcon from "../../assets/mileageIcon.svg";
import check from "../../assets/Check.svg";
import goIcon from "../../assets/goIcon.svg";
</script>

<template>
    <div
        class="max-w-[370px] p-[2rem] rounded-[12px] border-[1px] border-[#E7E7E7]"
    >
        <div class="column flex justify-end">
            <Link href=""><img :src="Heart" alt="" class="w-full" /></Link>
        </div>
        <Link href="">
            <div class="column flex flex-col gap-5 items-start">
                <img :src="CardCarImage" alt="" class="w-full" />
                <span
                    class="bg-[#f5f5f5] inline-block px-8 py-2 text-center rounded-[40px]"
                    >SUV</span
                >
            </div>

            <div class="column mt-[2rem]">
                <h5 class="font-medium text-[1.5rem] text-customPrimaryColor">
                    Hyundai Creta
                </h5>
                <div class="car_short_info mt-[1rem] flex gap-3">
                    <img :src="carIcon" alt="" />
                    <div class="features">
                        <span class="text-[1.15rem]"
                            >Manual . Diesel . 5 Seats</span
                        >
                    </div>
                </div>
                <div class="extra_details flex gap-5 mt-[1rem]">
                    <div class="col flex gap-3">
                        <img :src="walkIcon" alt="" /><span
                            class="text-[1.15rem]"
                            >9.3 KM Away</span
                        >
                    </div>
                    <div class="col flex gap-3">
                        <img :src="mileageIcon" alt="" /><span
                            class="text-[1.15rem]"
                            >100km/d</span
                        >
                    </div>
                </div>


                <div class="benefits mt-[2rem] grid grid-cols-2 gap-3">
                 <span class="flex gap-3 items-center text-[12px] "><img :src="check" alt="" />Free Cancellation</span>
                 <span class="flex gap-3 items-center text-[12px] "><img :src="check" alt="" />Unlimited mileage</span>
                 <span class="flex gap-3 items-center text-[12px] "><img :src="check" alt="" />Unlimited kilometers</span>
                </div>

                <div class="mt-[2rem] flex justify-between items-center">
                    <div> <span class="text-customPrimaryColor text-[1.875rem] font-medium">€150</span><span>/day</span></div>
                    <img :src="goIcon" alt="" />
                </div>

            </div>
        </Link>
    </div>
</template>

<style></style>
