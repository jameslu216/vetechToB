<template>
  <div class="w-100">
    <div class="col-12 md:col-5 p-0">
      <img class="vet_pic" src="/AllianceVet.svg" />
      <div class="d-inline-block" style="height: 75px">
        <span class="vet_name">{{ vet_name }}</span>
        <img class="vet_icon" src="/AllianceIcon.svg" />
      </div>
      <div class="booking_table">
        <div class="row m-3">
          <div class="leftblock blacktitle col-5 p-0">
            <span>顧客資訊</span>
          </div>
        </div>
        <div class="row ml-3">
          <div class="leftblock col-3 p-0">
            <label for="customer-name">姓名</label>
          </div>
          <div class="col-7 p-0">
            <textarea
              v-model="customer_name"
              class="w-100"
              style="height: 32px"
              placeholder="必填"
              required
            ></textarea>
          </div>
        </div>
        <div class="row ml-3">
          <div class="leftblock col-3 p-0">
            <label for="customer-phone-number">電話</label>
          </div>
          <div class="col-7 p-0">
            <textarea
              v-model="customer_phone_number"
              class="w-100"
              style="height: 32px"
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
        <div class="row ml-3">
          <div class="leftblock col-3 p-0">
            <label class="normal_text" for="pet-name">姓名</label>
          </div>
          <div class="col-7 p-0">
            <textarea
              v-model="pet_name"
              class="w-100"
              style="height: 32px"
              placeholder="必填"
              required
            ></textarea>
          </div>
        </div>
        <div class="row ml-3">
          <div class="leftblock col-3 p-0">
            <label class="normal_text" for="pet-gender">性別</label>
          </div>
          <div class="col-7 p-0">
            <textarea
              v-model="pet_gender"
              class="w-100"
              style="height: 32px"
              placeholder="必填"
              required
            ></textarea>
          </div>
        </div>

        <div class="row ml-3">
          <div class="leftblock col-3 p-0">
            <label class="normal_text" for="pet-type">品種</label>
          </div>
          <div class="col-7 p-0">
            <textarea
              v-model="pet_variety"
              class="w-100"
              style="height: 32px"
              placeholder="必填"
              required
            ></textarea>
          </div>
        </div>
        <div class="row ml-3">
          <div class="leftblock col-3 p-0">
            <label class="normal_text" for="pet-age"></label>年齡
          </div>
          <div class="col-7 p-0">
            <textarea
              v-model="pet_age"
              class="w-100"
              style="height: 32px"
              placeholder="必填"
              required
            ></textarea>
          </div>
        </div>
        <div class="row ml-3">
          <div class="leftblock col-3 p-0">
            <label class="normal_text" for="pet-weight"></label>體重
          </div>
          <div class="col-7 p-0">
            <textarea
              v-model="pet_weight"
              class="w-100"
              style="height: 32px"
              placeholder="選填"
            ></textarea>
          </div>
        </div>
        <!-- <div class="row ml-3">
          <div class="leftblock col-3 p-0">
            <label for="pet-feeding-habit"></label>餵食習慣
          </div>
          <div class="col-7 p-0">
            <textarea
              v-model="pet_feeding_habbit"
              class="w-100"
              style="height: 32px"
              placeholder="選填"
            ></textarea>
          </div>
        </div>
        <div class="row ml-3">
          <div class="leftblock col-3 p-0">
            <label for="pet-chip-num"></label>晶片號碼
          </div>
          <div class="col-7 p-0">
            <textarea
              v-model="pet_chip_num"
              class="w-100"
              style="height: 32px"
              placeholder="選填"
            ></textarea>
          </div>
        </div> -->

        <div class="row ml-3 mt-3">
          <div class="leftblock col-5 p-0 blacktitle">
            <span>診療項目</span>
          </div>
        </div>

        <div class="row ml-3">
          <b-form-checkbox-group
            v-model="service_type_selected"
            :options="service_type"
            class="w-100 leftblock normal_text"
            stacked
            value-field="item"
            text-field="name"
            disabled-field="notEnabled"
          ></b-form-checkbox-group>
        </div>

        <div class="row ml-3 mt-2">
          <div class="leftblock col-2 p-0">
            <label 
class="normal_text"
             for="pet-reminder"></label>備註
          </div>
          <div class="col-9 p-0">
            <textarea
              v-model="pet_note"
              class="w-100"
              style="height: 64px"
              placeholder="選填"
            ></textarea>
          </div>
        </div>

        <div class="row m-0">
          <div class="leftblock m-3 col-5 blacktitle p-0">
            <span>就診日期</span>
          </div>
          <div class="col-12 p-0">
            <div class="card-body">
              <div class="card-text">
                <div class="mb-3">
                  <b-calendar
                    class="d-block booking-calendar"
                    label-help=""
                    :date-disabled-fn="dateDisabled"
                    :date-format-options="{
                      year: 'numeric',
                      month: 'numeric',
                      day: 'numeric',
                    }"
                    @context="onContext"
                    locale="zh-TW"
                    width="320px"
                    @selected="showServableTime()"
                  ></b-calendar>
                </div>
                <div class="row mx-0 p-0 booking_time">
                  <div
                    class="col-4 p-0 my-3"
                    v-for="(time, index) in servable_time"
                    :key="index"
                    @click="submitBooking(time, $event)"
                  >
                    <span
                      :class="selected_time == time ? 'Active' : 'notActive'"
                      class="time_button"
                      >{{ time }}</span
                    >
                  </div>
                </div>
              </div>
            </div>

            <!-- <b-input-group class="my-3 mx-1" style="width:270px">
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
                    </b-input-group> -->
          </div>
        </div>
        <div v-if="selected_date && selected_time" class="row mb-3">
          <span class="text-center w-100 normal_text"
            >您的預約日期為{{ "   " }}{{ selected_date }}{{ "   "
            }}{{ selected_time }}</span
          >
        </div>
      </div>

      <div class="row mt-3">
        <div class="col-12">
          <div class="text-center booking_button">立即預約</div>
        </div>
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
      formatted_date: "",
      selected_date: "",
      selected_time: "",
      customer_name: "",
      customer_phone_number: "",
      pet_name: "",
      pet_gender: "",
      pet_variety: "",
      pet_age: "",
      pet_weight: "",
      pet_feeding_habbit: "",
      pet_chip_num: "",
      pet_note: "",
      service_type_selected: [],
      servable_time: ["09:00", "10:00", "11:00", "12:30", "13:30"],
      service_type: [
        { item: "1", name: "年度體檢" },
        { item: "2", name: "新客戶(請於10分鐘前到達)" },
        { item: "3", name: "疫苗接種" },
        { item: "4", name: "藥物Refill" },
        { item: "5", name: "手術" },
        { item: "6", name: "生病動物檢查" },
        { item: "7", name: "超音波" },
        { item: "8", name: "血檢" },
        { item: "9", name: "其他" },
      ],
    };
  },
  mounted() {},
  methods: {
    submitBooking(time, event) {
      this.selected_time = time;
      //送出預約api
    },
    showServableTime() {
      // selected_date:"2021-05-15"
      // formatted_date:"2021/5/15"
      // 選定日期後 打 http://127.0.0.1:8000/api/clinic/doctor?clinic_id=1&date=2021-05-10&day=1
      // this.servable_time = response.times;
    },
    dateDisabled(ymd, date) {
      // Disable weekends (Sunday = `0`, Saturday = `6`) and
      // disable days that fall on the 13th of the month
      const year = date.getFullYear();
      const month = date.getMonth() + 1; // 月份它預設一月是0 所以要+1
      const weekday = date.getDay();
      const day = date.getDate();
      // 我預期後端拿回診所可預約日期以後 在這裡比對
      if (day == 15 || day == 20) return false; // 代表15號跟20號可以按
      // Return `true` if the date should be disabled
      return true;
    },
    setToday() {
      const now = new Date();
      this.value = new Date(now.getFullYear(), now.getMonth(), now.getDate());
    },
    onContext(ctx) {
      // The date formatted in the locale, or the `label-no-date-selected` string
      this.formatted_date = ctx.selectedFormatted;
      // The following will be an empty string until a valid date is entered
      this.selected_date = ctx.selectedYMD;
    },
  },
};
</script>
<style lang="scss" scoped>
.normal_text {
  font-size: 18px;
}
.vet_pic {
  width: 300px;
  height: 300px;
  display: block;
  margin: auto;
  margin-bottom: 50px;
  margin-top: 50px;
}
@media screen and (max-width: 767px) {
  .booking_button {
    background-color: #33b6b0;
    color: white;
    border-radius: 6px;
    width: 150px;
    height: 40px;
    font-size: 18px;
    font-weight: bold;
    line-height: 40px;
    position: absolute;
    margin-left: -75px;
    left: 50%;
  }
  .booking_time .Active {
    background-color: #1afd9c;
  }
  .time_button {
    padding: 5px 15px;
    border: 2px solid #33b6b0;
    border-radius: 20px;
  }
  .time_button :hover {
    color: #575757;
  }
  .card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1.25rem;
  }
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
    //margin-left: 24px;
  }
  .blacktitle {
    font-size: 24px;
    font-weight: bold;
  }
  .booking_table {
    margin-left: 10px;
    margin-right: 10px;
    border: 2px solid #33b6b0;
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
