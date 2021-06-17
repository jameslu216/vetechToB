export default {
    //api_token: 'PohA7dN4bGYV2LTWyMUinMeMIaChHXEMFuOMkkcLndMzf9kuYh4cSfSD96W4wJvj',
    BASE_API_URL: "http://127.0.0.1:8000/api",
    // BASE_URL: 'http://127.0.0.1:8000',
    // activateAPIToken: async function () {
    //     var url = this.BASE_URL + '/apiToken';
    //     this.api_token = 'api_token=' + (await axios.get(url)).data.api_token;
    // },
    getClinic: function(clinic_id) {
        let url = this.BASE_API_URL + "/clinic?clinic_id=" + clinic_id;
        return axios.get(url);
    },
    getServableTime: function(clinic_id, date, day) {
        let url =
            this.BASE_API_URL +
            "/clinic/doctor?clinic_id=" +
            clinic_id +
            "&date=" +
            date +
            "&day=" +
            day;
        return axios.get(url);
    },
    addReservation: function(data, api_token) {
        return axios({
            method: "post",
            url: this.BASE_API_URL + "/reservation/create",
            headers: { Authorization: `Bearer ${api_token}` },
            data: data
        });
    },
    getReservation: function(clinic_id, date) {
        let url = `${this.BASE_API_URL}/reservation?clinic_id=${clinic_id}&date=${date}`;
        return axios.get(url);
    },
    getDiagnosisInfo: function(clinic_id, date) {
        let url = `${this.BASE_API_URL}/reservation/info?clinic_id=${clinic_id}&date=${date}`;
        return axios.get(url);
    },
    getDiagnosisRecord: function(clinic_id, date) {
        let url = `${this.BASE_API_URL}/diagnosis/record?clinic_id=${clinic_id}&customer_id=${date}`;
        return axios.get(url);
    },
    userLogin: function(data) {
        return axios({
            method: "post",
            url: this.BASE_API_URL + "/user/login",
            data: data
        })
            .then(res => {
                //this.api_token = res.data.api_token
                return res.data;
            })
            .catch(res => {
                alert("帳號密碼輸入錯誤");
                return "failed";
            });
    },
    userRegister: function(data) {
        return axios({
            method: "post",
            url: this.BASE_API_URL + "/user/register",
            data: data
        })
            .then(res => {
                alert("註冊成功，登入後即可預約");
                return res.data;
            })
            .catch(res => {
                alert("註冊資料有欄位未填完整，請確認");
                return "failed";
            });
    },
    saveDiagnosisRecord: function(data) {
        console.log(data);
        return axios({
            method: "post",
            url: this.BASE_API_URL + "/diagnosis/record/move_and_create",
            data: data
        });
    }
};
