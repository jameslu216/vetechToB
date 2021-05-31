export default {
    api_token: 'api_token=',
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
        axios({
            method: 'post',
            url: this.BASE_API_URL + '/reservation',
            data: data
        });
    },
    getReservation: function (clinic_id,date) {
        let url = `${this.BASE_API_URL}/reservation?clinic_id=${clinic_id}&date=${date}`;
        return axios.get(url);
    },

}
