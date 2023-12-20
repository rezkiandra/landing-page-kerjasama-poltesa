// Chart 2
const ctx2 = document.getElementById("myChart2");
new Chart(ctx2, {
    type: 'bar',
    data: {
        labels: ["2018", "2019", "2020", "2021", "2022", "Luar Negeri"],
        datasets: [
            {
                label: "Total Kerjasama 2018-2021",
                data: [19, 29, 47, 72, 5, 35],
                borderWidth: 2,
            }
        ]
    }
})
// End Chart 2