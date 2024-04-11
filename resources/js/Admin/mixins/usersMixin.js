export default {
    mounted() {
        axios.get('/api/admin/users')
            .then(response => {
                this.users = response.data;
            })
            .catch(error => {
                console.error('Kullanıcıları alırken bir hata oluştu:', error);
            });
    },
}
