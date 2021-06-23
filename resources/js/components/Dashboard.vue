<template>
  <div class="col-12 m-0" style="background-color: #c4e1e1">
    <div class="row">
      <!-- <div class="col-0-5 p-0" style="background-color: #c4c4c4"></div> -->
      <div class="col-12 p-0">
        <div class="row m-3 p-0">
          <div class="col-12 px-0 pb-3 upcoming_page">
            <div class="row m-0 title__main_title">
              <div class="p-3">
                <span>Upcoming Book</span>
              </div>
              <div class="p-2">
                <b-form-datepicker
                  id="example-datepicker"
                  v-model="selected_date"
                  class="mb-2"
                  width="350px"
                ></b-form-datepicker>
              </div>
            </div>
            <div class="row item_title">
              <div class="title_colname_xs title_text">日期</div>
              <div class="title_colname_xs title_text">時間</div>
              <div class="title_colname_s title_text">寵物姓名</div>
              <div class="title_colname_s title_text">寵物性別</div>
              <div class="title_colname_s title_text">飼主姓名</div>
              <div class="title_colname_s title_text">負責醫生</div>
              <div class="title_colname_s title_text">治療項目</div>
              <div class="title_colname_m title_text">診前備註</div>
              <div class="title_colname_m title_text">電話號碼</div>
              <div class="reservation_content_button title_text">過往紀錄</div>
              <div class="reservation_content_button title_text">進入診間</div>
              <div class="reservation_content_button title_text">編輯/取消</div>
            </div>
            <div v-for="(item, index) in reservation" :key="index">
              <div class="row py-3 mt-2 mb-2 reservation_col">
                <div class="reservation_content_xs">
                  {{ item.date }}
                </div>
                <div class="reservation_content_xs">
                  {{ item.time }}
                </div>
                <div class="reservation_content_s">
                  {{ item.pet_name }}
                </div>
                <div class="reservation_content_s">
                  {{ item.pet_gender }}
                </div>
                <div class="reservation_content_s">
                  {{ item.patient_name }}
                </div>
                <div class="reservation_content_s">
                  {{ item.doctor_name }}
                </div>
                <div class="reservation_content_s">
                  {{ item.service_type }}
                </div>
                <div class="reservation_content_m">
                  {{ item.note }}
                </div>
                <div class="reservation_content_m">
                  {{ item.phone }}
                </div>
                <div class="reservation_content_button">
                  <button
                    class="btn btn-info"
                    style="width: 60px; font-size: 12px; padding: 4px"
                    v-on:click="getRecord(item.customer_id, index)"
                  >
                    紀錄
                  </button>
                </div>
                <div class="reservation_content_button">
                  <button
                    class="btn btn-success"
                    style="width: 60px; font-size: 12px; padding: 4px"
                    v-on:click="startDiagnosis(index)"
                  >
                    開始看診
                  </button>
                </div>
                <div class="reservation_content_button" style="width: 10% !important">
                  <b-button
                    style="width: 40px; font-size: 12px; padding: 4px"
                    @click="
                      editReservation = !editReservation;
                      onclickReservation = index;
                    "
                    >編輯</b-button
                  >
                  <b-button style="width: 40px; font-size: 12px; padding: 4px" @click="deleteReservation(index)"
                    >刪除</b-button
                  >
                </div>
              </div>

              <div class="w-100">
                <div class="row record_col" v-if="item.isOpenRecord != undefined && item.isOpenRecord == true">
                  <div class="reservation_content_s">日期</div>
                  <div class="reservation_content_s">時間</div>
                  <div class="reservation_content_s">負責醫生</div>
                  <div class="reservation_content_l">診前備註</div>
                  <div class="reservation_content_l">診後備註</div>
                </div>
                <div
                  v-for="record in diagnosis_record"
                  v-bind:key="record.diagnosis_note"
                  v-if="item.isOpenRecord != undefined && item.isOpenRecord == true"
                >
                  <div class="row record_col">
                    <div class="reservation_content_s">
                      {{ record.date }}
                    </div>
                    <div class="reservation_content_s">
                      {{ record.time }}
                    </div>
                    <div class="reservation_content_s">
                      {{ record.doctor_name }}
                    </div>
                    <div class="reservation_content_l">
                      {{ record.note }}
                    </div>
                    <div class="reservation_content_l">
                      {{ record.diagnosis_note }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <b-modal title="修改預約" v-model="editReservation">
          <span>因應老師要求補上，短時間沒辦法設計，故請照 placeholder 內填寫資訊</span>
          <div class="row">
            <span class="col-3">日期</span>
            <input class="col-8" type="text" v-model="modifyDate" placeholder="ex: 2021-01-01" />
          </div>
          <div class="row">
            <span class="col-3">時間</span>
            <input class="col-8" type="text" v-model="modifyTime" placeholder="ex: 21:00" />
          </div>
          <template #modal-footer="{ cancel }">
            <b-button size="sm" variant="danger" @click="cancel()"> 取消 </b-button>
            <b-button
              size="sm"
              variant="success"
              v-on:click="
                modifyReservation();
                editReservation = !editReservation;
              "
            >
              修改預約
            </b-button>
          </template>
        </b-modal>
        <div class="row m-3 p-0">
          <div class="col-12 px-0 pb-3">
            <div class="row m-0 p-0">
              <div class="col-8 p-0">
                <div class="row">
                  <div class="col-4 p-0" v-for="(doctor, index) in doctor_diagnosis_list" :key="doctor.doctor_id">
                    <div class="m-3 doctor_table">
                      <div class="title__sub_title">
                        <span>Dr.{{ doctor.doctor_name }}</span>
                      </div>
                      <div
                        class="row reservation_col text-center"
                        v-for="(doctor_reservation, index) in doctor.diagnosis_time_list"
                        :key="index"
                      >
                        <div class="col-3">
                          {{ doctor_reservation.diagnosis_time }}
                        </div>
                        <div class="col-8">
                          {{ doctor_reservation.service_type }}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="p-0 col-4">
                <div class="ml-3 my-3 onlooking_list">
                  <div class="title__sub_title">
                    <span>正在看診</span>
                  </div>
                  <div class="row item_title text-center">
                    <div class="col-4 title_text">醫生</div>
                    <div class="col-4 title_text">飼主</div>
                    <div class="col-4 title_text">離開</div>
                  </div>
                  <div class="row reservation_col text-center" v-for="(object, index) in looking_list" :key="index">
                    <div class="col-4 p-0">
                      {{ object.doctor_name }}
                    </div>
                    <div class="col-4 p-0">
                      {{ object.patient_name }}
                    </div>
                    <div class="col-4 p-0">
                      <b-button
                        @click="
                          modalShow = !modalShow;
                          exit_id = index;
                        "
                        >完成看診</b-button
                      >
                    </div>
                  </div>
                </div>
              </div>
              <b-modal title="請填寫診後資訊" v-model="modalShow">
                <div class="row">
                  <span class="col-3">費用</span>
                  <input class="col-8" type="number" v-model="cost" />
                </div>
                <div class="row mt-3">
                  <span class="col-3">診後備注</span>
                  <textarea class="col-8" v-model="exit_note"></textarea>
                </div>
                <template #modal-footer="{ cancel }">
                  <b-button size="sm" variant="danger" @click="cancel()"> 取消 </b-button>
                  <b-button
                    size="sm"
                    variant="success"
                    v-on:click="
                      exitDiagnosis();
                      modalShow = !modalShow;
                    "
                  >
                    儲存紀錄
                  </b-button>
                </template>
              </b-modal>
            </div>
          </div>
        </div>
      </div>

      <!-- <div class="waiting_page"></div>
                <div class="text-left gray-title">
                    <span class="title__sub_title">已到診等候</span>
                </div>
                <div class="waiting_page lower_radius"></div> -->
    </div>
    <router-view></router-view>
  </div>
</template>
<script>
import httpAPI from '../httpAPI.js';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
export default {
  name: 'Dashboard',
  data() {
    return {
      clinic_id: '1',
      doctor_diagnosis_list: [
        {
          doctor_id: '1',
          doctor_name: 'Dr.Chen',
          diagnosis_time_list: [
            { diagnosis_time: '10:00', service_type: '手術門診' },
            { diagnosis_time: '11:00', service_type: '藥物refill' },
            { diagnosis_time: '12:00', service_type: '手術門診' },
          ],
        },
        {
          doctor_id: '2',
          doctor_name: 'Dr.Chen',
          diagnosis_time_list: [{ diagnosis_time: '10:00', service_type: '手術門診' }],
        },
        {
          doctor_id: '3',
          doctor_name: 'Dr.Chen',
          diagnosis_time_list: [{ diagnosis_time: '10:00', service_type: '手術門診' }],
        },
      ],
      diagnosis_record: [
        {
          date: '03/15',
          time: '15:00',
          doctor_name: '王威閒',
          service_type: '手術',
          note: '皮膚紅紅的',
          diagnosis_note: '皮膚跳蚤驅逐',
        },
      ],
      reservation: [
        {
          reservation_id: '023',
          date: '03/16',
          time: '15:00',
          pet_name: 'BoBo',
          pet_gender: 'F(S)',
          patient_name: '陳先生',
          doctor_name: 'Dr.Chen',
          service_type: '定期健檢',
          note: '發現小型肉塊',
          phone: '0912345678',
        },
      ],
      selected_date: '',
      modalShow: false,
      editReservation: false,
      looking_list: [],
      cost: '',
      exit_note: '',
      exit_id: '',
      onclickReservation: '',
      modifyDate: '',
      modifyTime: '',
    };
  },
  watch: {
    selected_date: function () {
      this.getReservation(this.selected_date);
      this.getDiagnosisInfo(this.selected_date);
    },
  },
  mounted() {
    const now = new Date();
    let month = now.getMonth() + 1;
    let date = now.getDate();
    if (month < 10) {
      month = `0${month}`;
    }
    if (date < 10) {
      date = `0${date}`;
    }
    const today = `${now.getFullYear()}-${month}-${date}`;
    this.selected_date = today;
  },
  methods: {
    deleteReservation(index) {
      let data = {
        clinic_id: this.clinic_id,
        reservation_id: this.reservation[index].reservation_id,
      };
      console.log(this.reservation[index], data);
      httpAPI.deleteReservation(data);
      this.getReservation(this.selected_date);
    },
    modifyReservation() {
      let data = {
        clinic_id: this.clinic_id,
        reservation_id: this.reservation[this.onclickReservation].reservation_id,
        date: this.modifyDate,
        time: this.modifyTime,
      };
      httpAPI.modifyReservation(data);
      this.getReservation(this.selected_date);
    },

    getRecord(customer_id, index) {
      this.reservation[index].isOpenRecord = !this.reservation[index].isOpenRecord;
      const vm = this;
      httpAPI.getDiagnosisRecord(this.clinic_id, customer_id).then(function (response) {
        console.log(response.data);
        vm.diagnosis_record = response.data;
      });
    },
    getReservation(today) {
      const vm = this;
      httpAPI.getReservation(this.clinic_id, today).then(function (response) {
        vm.reservation = response.data.reservation_list;
        vm.reservation.forEach((object) => {
          object.isOpenRecord = false;
        });
      });
    },
    getDiagnosisInfo(today) {
      const vm = this;
      httpAPI.getDiagnosisInfo(this.clinic_id, today).then(function (response) {
        vm.doctor_diagnosis_list = response.data;
      });
    },
    startDiagnosis(index) {
      this.looking_list.push(this.reservation[index]);
      this.reservation.splice(index, 1);
    },
    exitDiagnosis() {
      this.saveDiagnosisRecord(this.looking_list[this.exit_id]);
      this.looking_list.splice(this.exit_id, 1);
    },
    saveDiagnosisRecord(object) {
      const vm = this;
      let data = {
        clinic_id: this.clinic_id,
        reservation_id: object.reservation_id,
        cost: this.cost,
        diagnosis_note: this.exit_note,
      };
      httpAPI.saveDiagnosisRecord(data).then(function (response) {
        vm.cost = '';
        vm.exit_note = '';
      });
    },
  },
};
</script>
<style lang="scss">
.title_text {
  font-size: 16px;
  font-weight: bold;
}
.title {
  &__main_title {
    height: 80px;
    border-radius: 10px 10px 0px 0px;
    background-color: #c4c4c4;
    text-align: left;
    font-weight: bold;
    padding: 15px 0px 15px 30px;
  }
  &__sub_title {
    height: 50px;
    border-radius: 10px 10px 0px 0px;
    background-color: #c4c4c4;
    text-align: left;
    font-weight: bold;
    padding: 15px 0px 15px 30px;
  }
}
.upcoming_page {
  background-color: white;
  border-radius: 10px;
  min-height: 500px;
}
.reservation_col {
  background-color: #c4e1e1;
  border-radius: 10px;
  margin: 6px;
  padding: 6px;
}
.record_col {
  background-color: #96fed1;
  border: 1px solid black;
  margin: 0px 6px;
  padding: 0px 6px;
}
.item_title {
  margin: 6px;
  padding-top: 12px;
}
.onlooking_list {
  border-radius: 10px;
  height: 250px;
  background-color: white;
}
.doctor_table {
  border-radius: 10px;
  min-height: 250px;
  background-color: white;
}
.title_colname_xs {
  width: 6%;
  text-align: center;
}
.title_colname_s {
  width: 8%;
  text-align: center;
}
.title_colname_m {
  text-align: center;
  width: 11%;
}
.reservation_content_xs {
  width: 6%;
  text-align: center;
}
.reservation_content_s {
  width: 8%;
  text-align: center;
}
.reservation_content_m {
  width: 11%;
  text-align: center;
}
.reservation_content_button {
  width: 8%;
  text-align: center;
}
.reservation_content_l {
  width: 20%;
  text-align: center;
}
</style>
