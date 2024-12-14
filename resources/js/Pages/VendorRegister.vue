<script setup lang="ts">
import { ref } from 'vue';

import warningIcon from '../../assets/WhiteWarningCircle.svg'
import { useForm } from '@inertiajs/vue3';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
// Multiple step form
const currentStep = ref(1); 

const moveToNextStep = () => {
    currentStep.value++;
};
const moveToPrevStep = () => {
    currentStep.value--;
};

// @click="moveToNextStep"
// Multiple step form


const form = useForm({
  full_name: '',
  phone_number: '',
  email: '',
  address: '',
  location: '',
  driving_license:'',
  passport:'',
  passport_photo:'',
});
</script>

<template>
    <main>
      <section class="overflow-x-hidden">
        <div class="container min-h-[80vh] flex justify-between">
            <div class="column  w-[40%]">
                <div class="flex min-h-full justify-center flex-col gap-8" v-if="currentStep === 1">
                    <h4>Create Vendor</h4>
                     <p>Create your listing in a few minutes to receive rental requests! All you need is a photo, a rate, and an address and our team will contact you and offer you a personalized appointment. Also, make sure you have the vehicle's registration certificate nearby.</p>
                    <div class="max-w-[300px]">
                     <button class="button-primary p-5 w-full" @click="moveToNextStep">
                                Continue
                    </button>
                    </div>
                </div>

                <!-- Step-2 -->
                <div class="flex min-h-full justify-center flex-col gap-8" v-if="currentStep === 2">
                    <h4>Register As Vendor</h4>
                    <form action="" class="vendor-form">
                        <div class="flex flex-col gap-5">
                            <div class="col">
                                
                                <InputLabel for="full_name" value="Full Name" />
                                <TextInput id="full_name" type="text" class="mt-1 block w-full" v-model="form.email" required/>
                                <InputError class="mt-2" :message="form.errors.full_name" />
                            </div>
                            <div class="col">
                                      <InputLabel for="phone_number" value="Phone Number" />
                                      <TextInput
                                        id="phone_number"
                                        type="phone"
                                        class="mt-1 block w-full"
                                        v-model="form.phone_number"
                                        required
                                      />
                                      <InputError class="mt-2" :message="form.errors.phone_number" />
                            </div>
                            <div class="col">
                                <InputLabel for="address" value="Address" />
                                  <TextInput
                                    id="address"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.address"
                                    required
                                  />
                                  <InputError class="mt-2" :message="form.errors.address" />
                            </div>
                            <div class="col">
                                <InputLabel for="email" value="Email" />
                                <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required/>
                                <InputError class="mt-2" :message="form.errors.email" />
                            </div>

                            <div class="col mt-[2rem]">
                                <span class="text-[1.75rem]">Location</span>

                                <div class="flex justify-between">
                                    <button class="w-[45%] button-secondary p-5" @click="moveToPrevStep">
                                         Back
                                    </button>
                                    <button class="w-[45%] button-primary p-5" @click="moveToNextStep">
                                         Continue
                                    </button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <!-- Step-2 -->

                <!-- Step-3 -->
                <div class="flex min-h-full justify-center flex-col gap-8" v-if="currentStep === 3">
                  <span class="text-[1.75rem] mb-[2rem]">Upload Your Documents</span>
                    <input type="file" @input="form.driving_license = $event.target.files[0]" />
                     <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                        {{ form.progress.percentage }}%
                      </progress>
                </div>
                <!-- Step-3 -->
            </div>
            <div class="column w-[50%] vendor-bg flex flex-col justify-center items-start p-10">
                <div class="col text-customPrimaryColor-foreground border-b-[2px] border-[white] pb-5">
                    <img :src="warningIcon" alt="">
                    <span class="my-5 inline-block text-[1.5rem]">Temporary documents</span>
                    <p>You can submit your ad with temporary documents (order form, temporary registration certificate, crossed out vehicle registration document and transfer certificate) while waiting to receive your final vehicle registration document.</p>
                </div>
                <div class="col text-customPrimaryColor-foreground mt-[2rem]">
                    <img :src="warningIcon" alt="">
                    <span class="my-5 inline-block text-[1.5rem]">Need some help?</span>
                    <p>Contact us on: +91 524555552</p>
                </div>
            </div>
        </div>
      </section>
    </main>
</template>


<style>
.vendor-bg{
    background: url("../../assets/vendorListingBgImage.jpg");
    background-repeat: no-repeat;
    background-size: cover;
}

.vendor-form input,
.vendor-form select{
    border: 1px solid #2B2B2B80;
    border-radius: 12px;
    padding: 0.75rem;
}
.vendor-form label{
    color:#2B2B2BBF;
}
</style>