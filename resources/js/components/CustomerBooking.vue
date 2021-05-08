<template>
    <div class="w-100">
        <div class="col-12 md:col-5 p-0">
            <img class="vet_pic" src="/AllianceVet.svg" />
            <div class="d-inline-block" style="height:75px">
                <span class="vet_name">{{ name }}</span>
                <img class="vet_icon" src="/AllianceIcon.svg" />
            </div>
            <br />
            <div class="col-12">
            <span style="font-size:18px;font-weight:bold;">看診日期</span>
            <b-input-group class="m-3" style="width:300px">
                <b-form-input
                    id="example-input"
                    v-model="value"
                    type="text"
                    placeholder="YYYY-MM-DD"
                    autocomplete="off"
                ></b-form-input>
                <b-input-group-append>
                    <b-form-datepicker
                        v-model="value"
                        button-only
                        right
                        locale="en-US"
                        aria-controls="example-input"
                        @context="onContext"
                    ></b-form-datepicker>
                </b-input-group-append>
            </b-input-group>
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
            name: "聯 盟 動 物 醫 院",
            branch_name: "仁武總院",
            work_time: {},
            address: "高雄市仁武區鳳仁路231號E棟",
            phone_number: "(07)2730964 #20",
            value: ""
        };
    },
    methods: {
        onContext(ctx) {
            // The date formatted in the locale, or the `label-no-date-selected` string
            this.formatted = ctx.selectedFormatted;
            // The following will be an empty string until a valid date is entered
            this.selected = ctx.selectedYMD;
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
}
@media screen and (min-width: 768px) {
    .vet_name {
        font-size: 40px;
        font-weight: bold;
        margin-right: 30px;
    }
}
</style>
