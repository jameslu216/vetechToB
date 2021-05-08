<template>
    <div class="col-12 m-0">
        <div class="row mt-4">
            <div class="" style="width:6%;background-color: #c4c4c4"></div>
            <div class=" px-3" style="width:68%">
                <div class="upcoming-page">
                    <div class="gray-title">
                        <span>Upcoming Book</span>
                    </div>
                    <div class="row item-title">
                        <div class="wd-s">Num</div>
                        <div class="wd-s">日期</div>
                        <div class="wd-s">時間</div>
                        <div class="wd-s">寵物姓名</div>
                        <div class="wd-s">寵物性別</div>
                        <div class="wd-s">飼主姓名</div>
                        <div class="wd-s">負責醫生</div>
                        <div class="wd-s">治療項目</div>
                        <div class="wd-l">診前備註</div>
                        <div class="wd-s">客戶來源</div>
                        <div class="wd-m">電話號碼</div>
                        <div class="wd-s">過往紀錄</div>
                    </div>
                    <div
                        v-for="(item, index) in booking_record"
                        class="row py-2 mt-2 mb-2 record-col"
                        :key="index"
                    >
                        <div class="wd-s">{{ item.num }}</div>
                        <div class="wd-s">{{ item.date }}</div>
                        <div class="wd-s">{{ item.time }}</div>
                        <div class="wd-s">{{ item.pet_name }}</div>
                        <div class="wd-s">{{ item.gender }}</div>
                        <div class="wd-s">{{ item.owner_name }}</div>
                        <div class="wd-s">{{ item.doctor }}</div>
                        <div class="wd-s">{{ item.appointment }}</div>
                        <div class="wd-m">{{ item.pre_note }}</div>
                        <div class="wd-s">{{ item.booking_from }}</div>
                        <div class="wd-m">{{ item.phone_num }}</div>
                        <button class="wd-s p-0 m-0">紀錄</button>
                    </div>
                </div>
            </div>
            <div class="p-0 " style="width:25%">
                <div class="text-left gray-title upper-radius">
                    <span class="title-discription">正在看診</span>
                    <div class="row item-title text-center">
                        <div class="col-3">醫生</div>
                        <div class="col-3">飼主</div>
                        <div class="col-3">診室</div>
                        <div class="col-3">離開</div>
                    </div>
                    <div
                        class="row record-col text-center"
                        v-for="(object, index) in looking_list"
                        :key="index"
                    >
                        <div class="col-3 p-0">{{ object.doctor }}</div>
                        <div class="col-3 p-0">{{ object.doctor }}</div>
                        <div class="col-3 p-0">room{{ index }}</div>
                    </div>
                </div>
                <div class="waiting-page"></div>
                <div class="text-left gray-title">
                    <span class="title-discription">已到診等候</span>
                </div>
                <div class="waiting-page lower-radius"></div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            booking_record: [
                {
                    num: "023",
                    date: "03/16",
                    time: "15:00",
                    pet_name: "BoBo",
                    gender: "F(S)",
                    owner_name: "陳先生",
                    doctor: "Dr.Chen",
                    appointment: "定期健檢",
                    pre_note: "發現小型肉塊",
                    booking_from: "Booking",
                    phone_num: "0912345678"
                },
                {
                    num: "024",
                    date: "03/16",
                    time: "15:00",
                    pet_name: "ToBo",
                    gender: "F(S)",
                    owner_name: "陳先生",
                    doctor: "Dr.Chen",
                    appointment: "定期健檢",
                    pre_note: "發現小型肉塊",
                    booking_from: "Booking",
                    phone_num: "0912345678"
                },
                {
                    num: "024",
                    date: "03/16",
                    time: "15:00",
                    pet_name: "ANNUAL",
                    gender: "F(S)",
                    owner_name: "陳先生",
                    doctor: "Dr.Chen",
                    appointment: "定期健檢",
                    pre_note: "發現小型肉塊、腳受傷",
                    booking_from: "Booking",
                    phone_num: "0912345678"
                }
            ],
            looking_list: [
                {
                    doctor: "Dr. Chen",
                    customer: "蒸魚好"
                },
                {
                    doctor: "Dr. Wang",
                    customer: "旅行號"
                },
                {
                    doctor: "Dr. Liao",
                    customer: "朱凱凱"
                }
            ]
        };
    }
};
</script>
<style lang="scss">
.title-discription {
    font-weight: bold;
    padding-left: 15px;
    line-height: 50px;
}
.upper-radius {
    border-radius: 10px 10px 0px 0px;
}
.lower-radius {
    border-radius: 0px 0px 10px 10px;
}
.gray-title {
    background-color: #c4c4c4;
    height: 50px;
}
.upcoming-page {
    background-color: white;
    border-radius: 10px;
    height: 500px;
}
.waiting-page {
    background-color: white;
    height: 200px;
}
.record-col {
    background-color: #c4e1e1;
    border-radius: 10px;
    margin: 6px;
}
.item-title {
    border-radius: 10px;
    margin: 6px;
    padding-top: 12px;
}
.wd-s {
    width: 7.5%;
    text-align: center;
}
.wd-m {
    text-align: center;
    width: 11%;
}
.wd-l {
    text-align: center;
    width: 10%;
}
</style>
