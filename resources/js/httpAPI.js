export default {
    api_token: 'PohA7dN4bGYV2LTWyMUinMeMIaChHXEMFuOMkkcLndMzf9kuYh4cSfSD96W4wJvj',
    BASE_API_URL: 'http://127.0.0.1:8000/api',
    // BASE_URL: 'http://127.0.0.1:8000',
    // activateAPIToken: async function () {
    //     var url = this.BASE_URL + '/apiToken';
    //     this.api_token = 'api_token=' + (await axios.get(url)).data.api_token;
    //     //console.log(this.api_token);
    // },
    getClinic: function (clinic_id) {
        let url = this.BASE_API_URL + '/clinic?clinic_id=' + clinic_id;
        return axios.get(url);
    },
    getServableTime: function (clinic_id, date, day) {
        let url = this.BASE_API_URL + '/clinic/doctor?clinic_id=' + clinic_id + '&date=' + date + '&day=' + day;
        return axios.get(url);
    },
    addReservation: function (data) {
        return axios({
            method: 'post',
            url: this.BASE_API_URL + '/reservation/create',
            headers: { Authorization: `Bearer ${this.api_token}` },
            data: data
        });
    },
    getReservation: function (clinic_id, date) {
        let url = `${this.BASE_API_URL}/reservation?clinic_id=${clinic_id}&date=${date}`;
        return axios.get(url);
    },
    getDiagnosisInfo: function (clinic_id, date) {
        let url = `${this.BASE_API_URL}/diagnosis/info?clinic_id=${clinic_id}&date=${date}`;
        return axios.get(url);
    },
    userLogin: function (data) {
        return axios({
            method: 'post',
            url: this.BASE_API_URL + '/user/login',
            data: data
        }).then((res) => {
            console.log(this.api_token);
            this.api_token = res.data.api_token
            console.log(this.api_token);
            return 'success'; 
        }
        ).catch((res) => {
            alert('帳號密碼輸入錯誤')
            return 'failed';
        });
    },
    userRegister: function (data) {
        return axios({
            method: 'post',
            url: this.BASE_API_URL + '/user/register',
            data: data
        })
    },
    saveDiagnosisRecord:function (data) {
        return axios({
            method: 'post',
            url: this.BASE_API_URL + '/diagnosis/record/move_and_create',
            data: data
        })
    },
}
