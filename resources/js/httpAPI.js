export default {
    api_token: 'Qf9qIAyWR761DD0MsWwNDSVKjBdMIvQp22qyD0oWfBjFznKKMrv7NCd5SYC7i71E',
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
            this.api_token = res.data.api_token
            return res;
        }
        ).catch((res)=>{
            return res;
        })
        ;
    },
    userRegister: function (data) {
        return axios({
            method: 'post',
            url: this.BASE_API_URL + '/user/register',
            data: data
        })
    },
}
