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
            <textarea v-model="patient_name" class="w-100" style="height: 32px" placeholder="必填" required></textarea>
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
            <textarea v-model="pet_name" class="w-100" style="height: 32px" placeholder="必填" required></textarea>
          </div>
        </div>
        <div class="row ml-3">
          <div class="leftblock col-3 p-0">
            <label class="normal_text" for="pet-gender">性別</label>
          </div>
          <div class="col-7 p-0">
            <textarea v-model="pet_gender" class="w-100" style="height: 32px" placeholder="必填" required></textarea>
          </div>
        </div>

        <div class="row ml-3">
          <div class="leftblock col-3 p-0">
            <label class="normal_text" for="pet-type">品種</label>
          </div>
          <div class="col-7 p-0">
            <textarea v-model="pet_variety" class="w-100" style="height: 32px" placeholder="必填" required></textarea>
          </div>
        </div>
        <div class="row ml-3">
          <div class="leftblock col-3 p-0"><label class="normal_text" for="pet-age"></label>年齡</div>
          <div class="col-7 p-0">
            <textarea v-model="pet_age" class="w-100" style="height: 32px" placeholder="必填" required></textarea>
          </div>
        </div>
        <div class="row ml-3">
          <div class="leftblock col-3 p-0"><label class="normal_text" for="pet-weight"></label>體重</div>
          <div class="col-7 p-0">
            <textarea v-model="pet_weight" class="w-100" style="height: 32px" placeholder="選填"></textarea>
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
            text-field="item"
            disabled-field="notEnabled"
          ></b-form-checkbox-group>
        </div>

        <div class="row ml-3 mt-2">
          <div class="leftblock col-2 p-0"><label class="normal_text" for="pet-reminder"></label>備註</div>
          <div class="col-9 p-0">
            <textarea v-model="pet_note" class="w-100" style="height: 64px" placeholder="選填"></textarea>
          </div>
        </div>

        <div class="row mt-3 m-0">
          <div class="leftblock m-3 col-5 blacktitle p-0">
            <span>就診日期</span>
          </div>
          <div class="col-12 p-0" style="margin-left: -20px">
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
                    :min="min_date"
                    :max="max_date"
                    @context="onContext"
                    locale="zh-TW"
                    width="350px"
                    @selected="showServableTime()"
                  ></b-calendar>
                </div>
                <div v-if="servable_time[0] != undefined" class="row mx-0 p-0 booking_time">
                  <div
                    class="col-4 p-0 my-3"
                    v-for="(time, index) in servable_time[0].times"
                    :key="index"
                    @click="selected_time = time"
                  >
                    <span :class="selected_time == time ? 'Active' : 'notActive'" class="time_button">{{ time }}</span>
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
            >您的預約日期為{{ '   ' }}{{ selected_date }}{{ '   ' }}{{ selected_time }}</span
          >
        </div>
      </div>

      <div class="row mt-3">
        <div class="col-12">
          <!-- <b-button class="text-center booking_button" @click="confirmBooking"
            >Simple msgBoxConfirm</b-button
          > -->

          <button type="button" class="btn booking_button" data-toggle="modal" data-target="#exampleModal">
            確認預約
          </button>

          <!-- Modal -->
          <div
            class="modal fade confirm_modal"
            id="exampleModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
          >
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">確認預約</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">您的預約日期為{{ '   ' }}{{ selected_date }}{{ '   ' }}{{ selected_time }}</div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" data-dismiss="modal" @click="submitBooking">
                    確認預約
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 md:col-3"></div>
    <div class="col-12 md:col-4"></div>
    <router-view></router-view>
  </div>
</template>

<script>
import httpAPI from '../httpAPI.js';
export default {
  name: 'CustomerBooking',
  data() {
    //  下面用來處理日曆的部分
    const now = new Date();
    const today = new Date(now.getFullYear(), now.getMonth(), now.getDate());
    const minDate = new Date(today);
    minDate.setMonth(minDate.getMonth());
    minDate.setDate(minDate.getDate());
    const maxDate = new Date(today);
    maxDate.setMonth(maxDate.getMonth() + 2);
    maxDate.setDate(minDate.getDate());

    return {
      clinic: {
        id: '1',
        name: '',
        address: '',
        introduction: '',
        service_type: '',
        phone: '',
        picture: '',
        serve_times: [],
      },
      bookingStatus: '',
      vet_name: '聯 盟 動 物 醫 院',
      vet_branch_name: '仁武總院',
      vet_work_time: {},
      vet_address: '高雄市仁武區鳳仁路231號E棟',
      vet_phone_number: '(07)2730964 #20',
      value: '',
      formatted_date: '',
      selected_date: '2021-5-22',
      selected_day: '',
      selected_time: '',
      patient_name: '',
      customer_phone_number: '',
      customer_api_token: '',
      pet_name: '',
      pet_gender: '',
      pet_variety: '',
      pet_age: '',
      pet_weight: '',
      pet_feeding_habbit: '',
      pet_chip_num: '',
      pet_note: '',
      service_type_selected: [],
      servable_doctor: [],
      servable_time: [],
      service_type: [
        // { item: "年度體檢", name: "年度體檢" },
        // { item: "請於10分鐘前到達", name: "新客戶(請於10分鐘前到達)" },
        // { item: "疫苗接種", name: "疫苗接種" },
        // { item: "藥物Refill", name: "藥物Refill" },
        // { item: "手術", name: "手術" },
        // { item: "生病動物檢查", name: "生病動物檢查" },
        // { item: "超音波", name: "超音波" },
        // { item: "血檢", name: "血檢" },
        // { item: "其他", name: "其他" },
      ],
      min_date: minDate,
      max_date: maxDate,
    };
  },
  watch: {
    clinic(newVal, oldVal) {
      this.service_type = newVal.service_type.split(',').map(function (item) {
        return { item: item, name: item }; // 比較大於五歲的
      });
    },
  },
  computed: {
    userInfo() {
      return this.$store.state.login.userInfo;
    },
  },
  created() {
    let self = this;
    //取得診所資訊
    httpAPI.getClinic(this.clinic.id).then(function (response) {
      self.clinic = response.data;
    });
    this.patient_name = this.userInfo.name;
    this.customer_phone_number = this.userInfo.phone;
    this.customer_api_token = this.userInfo.api_token;
  },
  mounted() {},
  methods: {
    submitBooking() {
      let service_type = '';
      const vm = this;
      this.service_type_selected.forEach((element) => {
        service_type += `${element} `;
      });
      service_type = service_type.substr(0, service_type.length - 1);
      //送出預約api
      let data = {
        clinic_id: this.clinic.id,
        patient_name: this.patient_name,
        phone: this.customer_phone_number,
        pet_name: this.pet_name,
        pet_variety: this.pet_variety,
        pet_gender: this.pet_gender,
        pet_age: this.pet_variety,
        service_type: service_type,
        note: this.pet_note,
        datetime: `${this.selected_date} ${this.selected_time}`,
        doctor_id: this.servable_time[0].doctor_id,
      };
      //預約
      httpAPI.addReservation(data, this.customer_api_token);
    },
    showServableTime() {
      // selected_date:"2021-05-15"
      // formatted_date:"2021/5/15"
      // 選定日期後 打 http://127.0.0.1:8000/api/clinic/doctor?clinic_id=1&date=2021-05-10&day=1
      // this.servable_time = response.times;
      this.selected_day = this.formatted_date.getDay();
      if (this.selected_day == 0) this.selected_day = 7;
      const servable_doctor = [];
      const servable_time = [];
      //取得當日空閑時間
      httpAPI.getServableTime(this.clinic.id, this.selected_date, this.selected_day).then(function (response) {
        for (let object in response.data) {
          servable_doctor.push(object);
          servable_time.push(response.data[object]);
        }
      });
      this.servable_doctor = servable_doctor;
      this.servable_time = servable_time;
    },
    dateDisabled(ymd, date) {
      // Disable weekends (Sunday = `0`, Saturday = `6`) and
      // disable days that fall on the 13th of the month
      const year = date.getFullYear();
      const month = date.getMonth() + 1; // 月份它預設一月是0 所以要+1
      const weekday = date.getDay();
      const day = date.getDate();
      for (var i = 0; i < this.clinic.serve_times.length; i++) {
        if (weekday == this.clinic.serve_times[i].day % 7) return false; // 代表15號跟20號可以按
      }
      // Return `true` if the date should be disabled
      return true;
    },
    setToday() {
      const now = new Date();
      this.value = new Date(now.getFullYear(), now.getMonth(), now.getDate());
    },
    onContext(ctx) {
      // The date formatted in the locale, or the `label-no-date-selected` string
      this.formatted_date = ctx.activeDate;
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
  .confirm_modal {
    position: fixed;
    width: 300px;
    left: 50%;
    margin-left: -150px;
    top: 40%;
  }
  .booking_button {
    background-color: #33b6b0;
    color: white;
    border-radius: 6px;
    width: 150px;
    height: 40px;
    font-size: 18px;
    font-weight: bold;
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
