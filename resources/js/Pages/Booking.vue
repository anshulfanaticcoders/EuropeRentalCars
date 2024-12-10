<script setup lang="ts">
import Breadcrumb from "@/Components/Breadcrumb.vue";
import ShareIcon from "../../assets/ShareNetwork.svg";
import Heart from "../../assets/Heart.svg";
import carIcon from "../../assets/carIcon.svg";
import walkIcon from "../../assets/walking.svg";
import mileageIcon from "../../assets/mileageIcon.svg";
import pickupLocationIcon from "../../assets/pickupLocationIcon.svg";
import returnLocationIcon from "../../assets/returnLocationIcon.svg";
import partnersIcon from "../../assets/partners.svg";
import infoIcon from "../../assets/WarningCircle.svg";
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";

const basicPlanItems = ref([
    "Limited Features",
    "Basic Support",
    "Trial for Premium Features",
    "Community Access",
    "No Commitment",
]);
const exclusivePlanItems = ref([
    "Premium Features",
    "Custom Integrations",
    "Personalised Onboarding",
    "Dedicated Account Manager",
    "Higher API Limits",
]);

const additionalEquipmentOptions = ref([
    {
        name: "Infant Seat",
        description: "Suitable for infants up to age 1, 0-9kg in weight",
        price: 150,
        quantity: 0,
    },
    {
        name: "Booster Seat",
        description: "Suitable for infants up to age 4-7, 15-30kg in weight",
        price: 200,
        quantity: 0,
    },
    {
        name: "Additional Driver",
        description:
            "Add additional drivers to drive the rental car. All drivers need to provide valid documentation.",
        price: 300,
        quantity: 0,
    },
    {
        name: "GPS Navigation Device",
        description:
            "GPS navigation device interface and language are usually in the local language.",
        price: 200,
        quantity: 0,
    },
]);
const props = defineProps({
    initialValue: {
        type: Number,
        default: 0,
    },
    min: {
        type: Number,
        default: 0,
    },
    max: {
        type: Number,
        default: 100,
    },
});

const emit = defineEmits(["update:quantity"]);

const quantity = ref(props.initialValue);

const increment = () => {
    if (quantity.value < props.max) {
        quantity.value++;
    }
};

const decrement = () => {
    if (quantity.value > props.min) {
        quantity.value--;
    }
};
</script>

<template>
    <main>
        <section>
            <div class="container py-customVerticalSpacing">
                <Breadcrumb />
            </div>
        </section>

        <section>
            <div
                class="container flex justify-between py-customVerticalSpacing gap-5"
            >
                <div class="column w-[65%] flex flex-col gap-10">
                    <div
                        class="free_cancellation p-5 bg-[#0099001A] border-[#009900] rounded-[8px] border-[1px]"
                    >
                        <p class="text-[1.15rem] text-[#009900] font-medium">
                            Free Cancellation before pick-up (19Nov 2023,
                            12:00PM)
                        </p>
                    </div>

                    <div class="flex flex-col gap-10">
                        <h4 class="text-[2.5rem]">Protection Plan</h4>

                        <!-- Protection Plan -->
                        <form
                            method=""
                            class="protection_plan flex justify-between gap-5"
                        >
                            <div
                                class="col w-[50%] rounded-[20px] border-[1px] border-[#153B4F] p-5 flex flex-col gap-5"
                            >
                                <span class="text-[1.5rem] text-center"
                                    >Free Plan</span
                                >
                                <strong class="text-[3rem] text-center"
                                    >€0</strong
                                >
                                <p
                                    class="text-[1.25rem] text-[#2B2B2B] text-center"
                                >
                                    Access to basic features without any
                                    subscription fee.
                                </p>
                                <button class="button-primary px-5 py-2">
                                    Select
                                </button>
                                <div class="checklist features">
                                    <ul
                                        class="check-list text-center mt-[1rem] inline-flex flex-col items-center w-full gap-3"
                                    >
                                        <li
                                            v-for="(
                                                item, index
                                            ) in basicPlanItems"
                                            :key="index"
                                            class="checklist-item"
                                        >
                                            {{ item }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div
                                class="col w-[50%] rounded-[20px] border-[1px] border-[#153B4F] p-5 flex flex-col gap-5"
                            >
                                <span
                                    class="text-[1.5rem] text-center text-[#016501]"
                                    >Exclusive Plan</span
                                >
                                <strong class="text-[3rem] text-center"
                                    >€100</strong
                                >
                                <p
                                    class="text-[1.25rem] text-[#2B2B2B] text-center"
                                >
                                    Access to basic features without any
                                    subscription fee.
                                </p>
                                <button class="button-primary px-5 py-2">
                                    Select
                                </button>
                                <div class="checklist features">
                                    <ul
                                        class="check-list text-center mt-[1rem] inline-flex flex-col items-center w-full gap-3"
                                    >
                                        <li
                                            v-for="(
                                                item, index
                                            ) in exclusivePlanItems"
                                            :key="index"
                                            class="checklist-item"
                                        >
                                            {{ item }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </form>

                        <!-- Additional Equipment -->

                        <div class="additional-equipment">
                            <h4 class="text-[2.5rem]">Additional Equipment</h4>
                            <p>
                                Please note these additional extras are payable
                                locally and do not form part of the rental price
                                shown. Prices are displayed by pressing the
                                title of each extra.
                            </p>
                            <div class="equipment-list">
                                <div
                                    v-for="(
                                        item, index
                                    ) in additionalEquipmentOptions"
                                    :key="index"
                                    class="equipment-item flex justify-between items-center mt-[2rem] gap-4 p-5 border-[1px] rounded-[12px] border-customPrimaryColor"
                                >
                                    <div class="col flex-1">
                                        <span
                                            class="text-[1.25rem] text-customPrimaryColor font-bold"
                                            >{{ item.name }}</span
                                        >
                                        <p class="text-customMediumBlackColor">
                                            {{ item.description }}
                                        </p>
                                    </div>
                                    <div class="col flex-[0.5]">
                                        <span
                                            class="text-[1.25rem] text-customPrimaryColor font-bold"
                                            >&euro;{{ item.price }} Per
                                            day</span
                                        >
                                    </div>
                                    <div class="col flex=[0.5]">
                                        <div class="quantity-counter">
                                            <button
                                                @click="item.quantity--"
                                                class="decrement"
                                                :disabled="item.quantity === 0"
                                            >
                                                -
                                            </button>
                                            <input
                                                type="number"
                                                v-model.number="item.quantity"
                                                class="value"
                                                min="0"
                                                max="10"
                                            />
                                            <button
                                                @click="item.quantity++"
                                                class="increment"
                                            >
                                                +
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="max-w-[300px]">
                            <button class="button-primary p-5 w-full">
                                Continue payment
                            </button>
                        </div>
                    </div>
                </div>

                <div class="column w-[35%]">
                    <div
                        class="rounded-[12px] border-[1px] border-[#153B4F] p-5 sticky top-[153px] bg-customPrimaryColor text-customPrimaryColor-foreground"
                    >
                        <div class="flex items-center justify-between gap-3">
                            <h4>Hyundai Creata</h4>
                            <span
                                class="bg-[#f5f5f5] inline-block px-8 py-2 text-center rounded-[40px] text-customPrimaryColor"
                                >SUV</span
                            >
                            <div class="icons flex items-center gap-3">
                                <Link href="" class="w-full"
                                    ><img :src="ShareIcon" alt=""
                                /></Link>
                                <Link href="" class="w-full"
                                    ><img :src="Heart" alt=""
                                /></Link>
                            </div>
                        </div>
                        <div class="">
                            <span
                                >Hosted by
                                <span class="vendorName uppercase"
                                    >YASMIN SULTANA</span
                                ></span
                            >
                        </div>
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

                        <div class="ratings"></div>

                        <div class="location mt-[2rem]">
                            <span
                                class="text-[1.5rem] font-medium mb-[1rem] inline-block"
                                >Location</span
                            >
                            <div class="col flex items-start gap-4">
                                <img :src="pickupLocationIcon" alt="" />
                                <div class="flex flex-col gap-1">
                                    <span class="text-[1.25rem] text-medium"
                                        >Zaragoza Railway Station, Dubai</span
                                    ><span class="">20 Nov 2023, 02:30 PM</span>
                                </div>
                            </div>
                            <div class="col flex items-start gap-4 mt-[2.5rem]">
                                <img :src="returnLocationIcon" alt="" />
                                <div class="flex flex-col gap-1">
                                    <span class="text-[1.25rem] text-medium"
                                        >Zaragoza Railway Station, Dubai</span
                                    ><span class="">20 Nov 2023, 02:30 PM</span>
                                </div>
                            </div>

                            <div class="pricing py-5 mt-[2rem]">
                                <div
                                    class="column flex flex-col justify-between gap-4"
                                >
                                    <span class="text-[1.5rem]"
                                        >Payment Details</span
                                    >

                                    <div
                                        class="flex justify-between items-center text-[1.15rem]"
                                    >
                                        <span>Price Per Day</span>
                                        <div>
                                            <strong
                                                class="text-[1.5rem] font-medium"
                                                >€50</strong
                                            >
                                            <span>/day</span>
                                        </div>
                                    </div>
                                    <div
                                        class="flex justify-between items-center text-[1.15rem]"
                                    >
                                        <span>Infant Seat</span>
                                        <div>
                                            <strong
                                                class="text-[1.5rem] font-medium"
                                                >€50</strong
                                            >
                                            <span>/day</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="column mt-[2rem]">
                                    <Link href="" class="underline">
                                        View Pricing details
                                    </Link>
                                </div>
                                <div
                                    class="column flex justify-between bg-white text-customPrimaryColor p-4 mt-[2rem] rounded-[12px]"
                                >
                                    <p class="flex items-center text-[1.15rem]">Total Payment (incl. VAT) <img :src="infoIcon" alt="" /></p>
                                    <span class="text-[1.25rem] font-bold">€450</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>

<style>
.check-list li {
    position: relative;
    list-style-type: none;
    padding-left: 2.5rem;
    margin-bottom: 0.5rem;
    display: inline-block;
}

.check-list li:before {
    content: "";
    display: block;
    position: absolute;
    left: 0;
    top: 0px;
    width: 8px;
    height: 15px;
    border-width: 0 2px 2px 0;
    border-style: solid;
    border-color: #153b4f;
    transform-origin: bottom left;
    transform: rotate(45deg);
}
.quantity-counter {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.quantity-counter .value {
    border: none;
    border-radius: 62px;
    margin: 2px 0;
    padding: 4px;
    text-align: center;
    height: 30px;
    width: 70px;
    background-color: #153b4f1a;
}

.quantity-counter .value::-webkit-outer-spin-button,
.quantity-counter .value::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

.quantity-counter .increment,
.quantity-counter .decrement {
    border: 0;
    background: transparent;
    cursor: pointer;
    color: #31313b;
    width: 30px;
    font-size: 2rem;
}
</style>
