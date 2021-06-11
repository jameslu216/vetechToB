<template>
  <div class="col-12 m-0" style="background-color: #c4e1e1">
    <div class="row">
      <div class="col-0-5 p-0" style="background-color: #c4c4c4"></div>
      <div class="col-11-5 p-0">
        <div class="row m-3 p-0">
          <div class="col-12 px-0 pb-3 upcoming_page">
            <div class="title_discription">
              <span>Upcoming Book</span>
            </div>
            <div class="row item_title">
              <div class="title_colname_s title_text">ID</div>
              <div class="title_colname_s title_text">日期</div>
              <div class="title_colname_s title_text">時間</div>
              <div class="title_colname_s title_text">寵物姓名</div>
              <div class="title_colname_s title_text">寵物性別</div>
              <div class="title_colname_s title_text">飼主姓名</div>
              <div class="title_colname_s title_text">負責醫生</div>
              <div class="title_colname_s title_text">治療項目</div>
              <div class="title_colname_m title_text">診前備註</div>
              <div class="title_colname_m title_text">電話號碼</div>
              <div class="title_colname_s title_text">過往紀錄</div>
              <div class="title_colname_s title_text">進入診間</div>

            </div>
            <div
              v-for="(item, index) in reservation"
              class="row py-3 mt-2 mb-2 record_col"
              :key="index"
            >
              <div class="record_content_s">{{ item.id }}</div>
              <div class="record_content_s">{{ item.date }}</div>
              <div class="record_content_s">{{ item.time }}</div>
              <div class="record_content_s">{{ item.pet_name }}</div>
              <div class="record_content_s">{{ item.pet_gender }}</div>
              <div class="record_content_s">{{ item.customer_name }}</div>
              <div class="record_content_s">{{ item.doctor }}</div>
              <div class="record_content_s">{{ item.serve_type }}</div>
              <div class="record_content_m">{{ item.note }}</div>
              <div class="record_content_m">{{ item.phone }}</div>
              <div class="record_content_s "><button>紀錄</button></div>
              <div class="record_content_s "><button>開始看診</button></div>

            </div>
          </div>
        </div>
        <div class="row m-3 p-0">
          <div class="col-12 px-0 pb-3">
            <div class="row m-0 p-0">
              <div class="col-8 p-0">
                <div class="row">
                  <div
                    class="col-4 p-0"
                    v-for="(doctor, index) in doctor_diagnosis_list"
                    :key="doctor.doctor_id"
                  >
                    <div class="m-3 doctor_table">
                      <div class="title_discription">
                        <span>{{ doctor.doctor_name }}</span>
                      </div>
                      <div
                        class="row record_col text-center"
                        v-for="(
                          doctor_reservation, index
                        ) in doctor.diagnosis_time_list"
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
                  <div class="title_discription">
                    <span>正在看診</span>
                  </div>
                  <div class="row item_title text-center">
                    <div class="col-4 title_text">醫生</div>
                    <div class="col-4 title_text">飼主</div>
                    <div class="col-4 title_text">離開</div>
                  </div>
                  <div
                    class="row record_col text-center"
                    v-for="(object, index) in looking_list"
                    :key="index"
                  >
                    <div class="col-4 p-0">{{ object.doctor }}</div>
                    <div class="col-4 p-0">{{ object.doctor }}</div>
                    <div class="col-4 p-0"><button>看診結束</button></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- <div class="waiting_page"></div>
                <div class="text-left gray-title">
                    <span class="title_discription">已到診等候</span>
                </div>
                <div class="waiting_page lower_radius"></div> -->
    </div>
    <router-view></router-view>
  </div>
</template>
<script>
import httpAPI from "../httpAPI.js";
export default {
  name: "Dashboard",
  data() {
    return {
      clinic_id: "1",
      doctor_diagnosis_list: [
        {
          doctor_id: "1",
          doctor_name: "Dr.Chen",
          diagnosis_time_list: [
            { diagnosis_time: "10:00", service_type: "手術門診" },
            { diagnosis_time: "11:00", service_type: "藥物refill" },
            { diagnosis_time: "12:00", service_type: "手術門診" },
          ],
        },
        {
          doctor_id: "2",
          doctor_name: "Dr.Chen",
          diagnosis_time_list: [
            { diagnosis_time: "10:00", service_type: "手術門診" },
          ],
        },
        {
          doctor_id: "3",
          doctor_name: "Dr.Chen",
          diagnosis_time_list: [
            { diagnosis_time: "10:00", service_type: "手術門診" },
          ],
        },
      ],
      reservation: [
        {
          id: "023",
          date: "03/16",
          time: "15:00",
          pet_name: "BoBo",
          pet_gender: "F(S)",
          customer_name: "陳先生",
          doctor: "Dr.Chen",
          serve_type: "定期健檢",
          note: "發現小型肉塊",
          phone: "0912345678",
        },
      ],
      looking_list: [
        {
          doctor: "Dr. Chen",
          customer: "蒸魚好",
        },
        {
          doctor: "Dr. Wang",
          customer: "旅行號",
        },
        {
          doctor: "Dr. Liao",
          customer: "朱凱凱",
        },
      ],
    };
  },
  mounted() {
    const now = new Date();
    let month = now.getMonth() + 1;
    let date = now.getDate()
    console.log(typeof month);
    if (month < 10) {
      month = `0${month}`;
    }
    if (date < 10) {
      date = `0${date}`;
    }
    const today = `${now.getFullYear()}-${month}-${date}`;
    this.getReservation(today);
    this.getDiagnosisInfo(today);
  },
  methods: {
    getReservation(today) {
      const vm = this;
      httpAPI.getReservation(this.clinic_id, today).then(function (response) {
        //Edge TODO
        //vm.reservation = response.data;
      });
    },
    getDiagnosisInfo(today) {
      const vm = this;
      httpAPI.getDiagnosisInfo(this.clinic_id, today).then(function (response) {
        console.log(response.data)

        vm.doctor_diagnosis_list = response.data;
      });
    },
  },
};
</script>
<style lang="scss">
.col-0-5 {
  width: 5%;
}
.col-11-5 {
  width: 95%;
}
.title_text {
  font-size: 18px;
  font-weight: bold;
}
.title_discription {
  border-radius: 10px 10px 0px 0px;
  background-color: #c4c4c4;
  height: 50px;
  text-align: left;
  font-weight: bold;
  padding: 15px 0px 15px 30px;
}
.upcoming_page {
  background-color: white;
  border-radius: 10px;
  min-height: 500px;
}

.record_col {
  background-color: #c4e1e1;
  border-radius: 10px;
  margin: 6px;
  padding: 6px;
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
.title_colname_s {
  width: 7.5%;
  text-align: center;
}
.title_colname_m {
  text-align: center;
  width: 11%;
}
.record_content_s {
  width: 7.5%;
  text-align: center;
}
.record_content_m {
  width: 11%;
  text-align: center;
}
</style>
