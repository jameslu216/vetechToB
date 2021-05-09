<template>
    <div class="w-100">
        <div class="col-12 md:col-5 p-0">
            <img class="vet_pic" src="/AllianceVet.svg" />
            <div class="d-inline-block" style="height:75px">
                <span class="vet_name">{{ vet_name }}</span>
                <img class="vet_icon" src="/AllianceIcon.svg" />
            </div>
            <div class="row m-3">
                <div class="leftblock blacktitle col-5 p-0">
                    <span>顧客資訊</span>
                </div>
            </div>
            <div class="row mx-3">
                <div class="leftblock col-3 p-0">
                    <label for="customer-name">姓名</label>
                </div>
                <div class="col-7 p-0 ">
                    <textarea
                        v-model="customer_name"
                        class="w-100"
                        style="height:32px"
                        placeholder="必填"
                        required
                    ></textarea>
                </div>
            </div>
            <div class="row mx-3">
                <div class="leftblock col-3 p-0">
                    <label for="customer-phone-number">電話</label>
                </div>
                <div class="col-7 p-0 ">
                    <textarea
                        v-model="customer_phone_number"
                        class="w-100"
                        style="height:32px"
                        placeholder="必填"
                        required
                    ></textarea>
                </div>
            </div>
            <div class="row m-3">
                <div class="leftblock col-5 p-0 blacktitle">
                    <span>寵物資訊</span>
                </div>
            </div>
            <div class="row mx-3">
                <div class="leftblock col-3 p-0">
                    <label for="pet-name">姓名</label>
                </div>
                <div class="col-7 p-0 ">
                    <textarea
                        v-model="pet_name"
                        class="w-100"
                        style="height:32px"
                        placeholder="必填"
                        required
                    ></textarea>
                </div>
            </div>
            <div class="row mx-3">
                <div class="leftblock col-3 p-0">
                    <label for="pet-gender">性別</label>
                </div>
                <div class="col-7 p-0 ">
                    <textarea
                        v-model="pet_gender"
                        class="w-100"
                        style="height:32px"
                        placeholder="必填"
                        required
                    ></textarea>
                </div>
            </div>

            <div class="row mx-3">
                <div class="leftblock col-3 p-0">
                    <label for="pet-type">品種</label>
                </div>
                <div class="col-7 p-0 ">
                    <textarea
                        v-model="pet_type"
                        class="w-100"
                        style="height:32px"
                        placeholder="必填"
                        required
                    ></textarea>
                </div>
            </div>
            <div class="row mx-3">
                <div class="leftblock col-3 p-0">
                    <label for="pet-age"></label>年齡
                </div>
                <div class="col-7 p-0 ">
                    <textarea
                        v-model="pet_age"
                        class="w-100"
                        style="height:32px"
                        placeholder="必填"
                        required
                    ></textarea>
                </div>
            </div>
            <div class="row mx-3">
                <div class="leftblock col-3 p-0">
                    <label for="pet-weight"></label>體重
                </div>
                <div class="col-7 p-0 ">
                    <textarea
                        v-model="pet_weight"
                        class="w-100"
                        style="height:32px"
                        placeholder="選填"
                    ></textarea>
                </div>
            </div>
            <div class="row mx-3">
                <div class="leftblock col-3 p-0">
                    <label for="pet-feeding-habit"></label>餵食習慣
                </div>
                <div class="col-7 p-0 ">
                    <textarea
                        v-model="pet_feeding_habbit"
                        class="w-100"
                        style="height:32px"
                        placeholder="選填"
                    ></textarea>
                </div>
            </div>
            <div class="row mx-3">
                <div class="leftblock col-3 p-0">
                    <label for="pet-chip-num"></label>晶片號碼
                </div>
                <div class="col-7 p-0 ">
                    <textarea
                        v-model="pet_chip_num"
                        class="w-100"
                        style="height:32px"
                        placeholder="選填"
                    ></textarea>
                </div>
            </div>

            <div class="row mx-3 mt-3">
                <div class="leftblock col-5 p-0 blacktitle">
                    <span>診療項目</span>
                </div>
            </div>

            <div class="row mx-3">
                <b-form-checkbox-group
                    v-model="service_type_selected"
                    :options="service_type"
                    class="w-100 leftblock"
                    stacked
                    value-field="item"
                    text-field="name"
                    disabled-field="notEnabled"
                ></b-form-checkbox-group>
            </div>

            <div class="row mx-3 mt-2">
                <div class="leftblock col-2 p-0">
                    <label for="pet-reminder"></label>備註
                </div>
                <div class="col-9 p-0 ">
                    <textarea
                        v-model="pet_reminder"
                        class="w-100"
                        style="height:64px"
                        placeholder="選填"
                    ></textarea>
                </div>
            </div>

            <div class="row m-3">
                <div class="leftblock col-5 blacktitle p-0">
                    <span>就診日期</span>
                </div>
                <div class="col-12">
                    <b-input-group class="my-3 mx-1" style="width:270px">
                        <b-form-input
                            id="example-input"
                            v-model="booking_date"
                            type="text"
                            placeholder="YYYY-MM-DD"
                            autocomplete="off"
                        ></b-form-input>
                        <b-input-group-append>
                            <b-form-datepicker
                                v-model="booking_date"
                                button-only
                                right
                                locale="zh-TW"
                                aria-controls="example-input"
                                @context="onContext"
                            ></b-form-datepicker>
                        </b-input-group-append>
                    </b-input-group>
                </div>
            </div>
            <div>
                <span></span>
            </div>
        </div>

        <div class="col-12 md:col-3"></div>
        <div class="col-12 md:col-4"></div>
        <router-view></router-view>
    </div>
</template>

<script>
export default {
    data() {
        return {
            vet_name: "聯 盟 動 物 醫 院",
            vet_branch_name: "仁武總院",
            vet_work_time: {},
            vet_address: "高雄市仁武區鳳仁路231號E棟",
            vet_phone_number: "(07)2730964 #20",
            value: "",
            booking_date: "",
            formatted_date: "",
            selected_date: "",
            customer_name: "",
            customer_phone_number: "",
            pet_name: "",
            pet_gender: "",
            pet_type: "",
            pet_age: "",
            pet_weight: "",
            pet_feeding_habbit: "",
            pet_chip_num: "",
            pet_reminder: "",
            service_type_selected: [],
            service_type: [
                { item: "1", name: "年度體檢" },
                { item: "2", name: "新客戶(請於10分鐘前到達)" },
                { item: "3", name: "疫苗接種" },
                { item: "4", name: "藥物Refill" },
                { item: "5", name: "手術" },
                { item: "6", name: "生病動物檢查" },
                { item: "7", name: "超音波" },
                { item: "8", name: "血檢" },
                { item: "9", name: "其他" }
            ]
        };
    },
    methods: {
        onContext(ctx) {
            // The date formatted in the locale, or the `label-no-date-selected` string
            this.formatted_date = ctx.selectedFormatted;
            // The following will be an empty string until a valid date is entered
            this.selected_date = ctx.selectedYMD;
        }
    }
};
</script>

<style lang="scss" scoped>
.vet_pic {
    width: 300px;
    height: 300px;
    display: block;
    margin: auto;
    margin-bottom: 50px;
    margin-top: 50px;
}
@media screen and (max-width: 767px) {
    .vet_name {
        font-size: 26px;
        font-weight: bold;
        margin-right: 30px;
    }
    .vet_icon {
        width: 60px;
    }
    .leftblock {
        text-align: left;
        margin-left: 24px;
    }
    .blacktitle {
        font-size: 24px;
        font-weight: bold;
    }
}
@media screen and (min-width: 768px) {
    .vet_name {
        font-size: 40px;
        font-weight: bold;
        margin-right: 30px;
    }
}
</style>
