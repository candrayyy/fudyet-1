const print = () => {
    const element = document.getElementById("table-print");

    const opt = {
        filename: "foods-recommendation-by-fudyet.pdf",
        image: { type: "jpeg", quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: "in", format: "letter", orientation: "portrait" },
    };

    return html2pdf(element, opt);
};
