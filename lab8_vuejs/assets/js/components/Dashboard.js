const Dashboard = {
    data() {
        return {
            totalBuku: 0,
            totalKategori: 0,
            totalAnggota: 0
        }
    },

    mounted() {
        this.loadData();
    },

    methods: {
        async loadData() {
            try {

                const buku = await axios.get(
                    'http://localhost/lab7_php_ci/public/buku'
                );

                const kategori = await axios.get(
                    'http://localhost/lab7_php_ci/public/kategori'
                );

                const anggota = await axios.get(
                    'http://localhost/lab7_php_ci/public/anggota'
                );

                this.totalBuku = buku.data.length;
                this.totalKategori = kategori.data.length;
                this.totalAnggota = anggota.data.length;

            } catch (error) {
                console.log(error);
            }
        }
    },

    template: `
<div>

    <h2>Dashboard E-Library</h2>

    <div class="dashboard-box">
        <h3>Total Buku</h3>
        <p>{{ totalBuku }}</p>
    </div>

    <div class="dashboard-box">
        <h3>Total Kategori</h3>
        <p>{{ totalKategori }}</p>
    </div>

    <div class="dashboard-box">
        <h3>Total Anggota</h3>
        <p>{{ totalAnggota }}</p>
    </div>

</div>
`
}