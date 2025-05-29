<!-- Enhanced export scripts with proper data formatting -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script>
// Get all data from DataTable for better exporting
function getTableData() {
    const table = $('#aduanTable').DataTable();
    // Convert DataTable data to array format
    return table.rows().data().toArray();
}

// Get table headers
function getTableHeaders() {
    const headers = [];
    document.querySelectorAll('#aduanTable thead th').forEach(th => {
        headers.push(th.textContent.trim());
    });
    return headers;
}

function exportToWord() {
    try {
        // Get complete data from DataTable
        const tableData = getTableData();
        const headers = getTableHeaders();
        
        // Create table rows HTML
        let tableRows = '<tr>';
        // Add headers
        headers.forEach(header => {
            tableRows += `<th>${header}</th>`;
        });
        tableRows += '</tr>';
        
        // Add data rows
        tableData.forEach((row, index) => {
            tableRows += '<tr>';
            // If row is an array (from DataTables API)
            if (Array.isArray(row)) {
                row.forEach(cell => {
                    tableRows += `<td>${cell || ''}</td>`;
                });
            } 
            // If row is an object (sometimes happens with DOM sourced data)
            else {
                for (let i = 0; i < headers.length; i++) {
                    tableRows += `<td>${row[i] || ''}</td>`;
                }
            }
            tableRows += '</tr>';
        });
        
        const html = `
            <html xmlns:o='urn:schemas-microsoft-com:office:office'
                  xmlns:w='urn:schemas-microsoft-com:office:word'
                  xmlns='http://www.w3.org/TR/REC-html40'>
                <head>
                    <meta charset='utf-8'>
                    <title>Senarai Aduan Pengguna</title>
                    <style>
                        @page {
                            size: A4 landscape;
                            margin: 1cm;
                            mso-page-orientation: landscape;
                        }
                        body {
                            margin: 0;
                            padding: 0;
                            width: 100%;
                            font-family: Arial, sans-serif;
                        }
                        table {
                            width: 100%;
                            border-collapse: collapse;
                            table-layout: fixed;
                            font-size: 8pt;
                        }
                        th {
                            background-color: #C4D7FF;
                            border: 1px solid black;
                            padding: 3px;
                            text-align: center;
                            font-weight: bold;
                        }
                        td {
                            border: 1px solid black;
                            padding: 3px;
                            text-align: left;
                            vertical-align: top;
                            word-wrap: break-word;
                        }
                        /* Column widths */
                        th:nth-child(1), td:nth-child(1) { width: 5%; }  /* Bil */
                        th:nth-child(2), td:nth-child(2) { width: 12%; } /* Kategori */
                        th:nth-child(3), td:nth-child(3) { width: 8%; }  /* Tarikh */
                        th:nth-child(4), td:nth-child(4) { width: 15%; } /* Nama Dan Jawatan */
                        th:nth-child(5), td:nth-child(5) { width: 10%; } /* Jenis Aset */
                        th:nth-child(6), td:nth-child(6) { width: 10%; } /* Nombor Siri */
                        th:nth-child(7), td:nth-child(7) { width: 10%; } /* Tempat Rosak */
                        th:nth-child(8), td:nth-child(8) { width: 10%; } /* Pengguna Terakhir */
                        th:nth-child(9), td:nth-child(9) { width: 10%; } /* Perihal Kerosakan */
                        th:nth-child(10), td:nth-child(10) { width: 10%; } /* Disahkan */

                        /* Header styling */
                        .header {
                            text-align: center;
                            margin-bottom: 20px;
                        }
                        h2 {
                            font-size: 14pt;
                            margin-bottom: 10px;
                            font-weight: bold;
                        }
                    </style>
                </head>
                <body>
                    <div class="header">
                        <h2>Senarai Aduan Pengguna</h2>
                    </div>
                    <table>
                        ${tableRows}
                    </table>
                </body>
            </html>`;
        
        const blob = new Blob(['\ufeff', html], {
            type: 'application/msword'
        });
        const url = URL.createObjectURL(blob);
        const link = document.createElement('a');
        link.href = url;
        link.download = 'Senarai_Aduan_Pengguna.doc';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        URL.revokeObjectURL(url);
        
        console.log("Word export successful");
    } catch (error) {
        console.error('Error exporting to Word:', error);
        alert('Error exporting to Word. Please try again.');
    }
}

function exportToExcel() {
    try {
        // Get complete data from DataTable
        const tableData = getTableData();
        const headers = getTableHeaders();
        
        // Create worksheet data structure
        const wsData = [
            headers, // Header row
        ];
        
        // Add data rows
        tableData.forEach(row => {
            // If row is an array (from DataTables API)
            if (Array.isArray(row)) {
                wsData.push(row);
            } 
            // If row is an object (sometimes happens with DOM sourced data)
            else {
                const rowData = [];
                for (let i = 0; i < headers.length; i++) {
                    rowData.push(row[i] || '');
                }
                wsData.push(rowData);
            }
        });
        
        // Create workbook and worksheet
        const wb = XLSX.utils.book_new();
        const ws = XLSX.utils.aoa_to_sheet(wsData);
        
        // Set column widths
        const cols = [
            { wch: 5 },  // Bil
            { wch: 15 }, // Kategori
            { wch: 12 }, // Tarikh
            { wch: 20 }, // Nama Dan Jawatan
            { wch: 15 }, // Jenis Aset
            { wch: 15 }, // Nombor Siri
            { wch: 15 }, // Tempat Rosak
            { wch: 15 }, // Pengguna Terakhir
            { wch: 20 }, // Perihal Kerosakan
            { wch: 15 }  // Disahkan
        ];
        
        ws['!cols'] = cols;
        
        // Set print settings for A4 Landscape
        ws['!print'] = {
            scale: 0.85, // Slightly reduced scale to ensure fitting
            paper: 9,    // A4
            orientation: true // landscape
        };

        // Set margins
        ws['!margins'] = {
            left: 0.5,
            right: 0.5,
            top: 0.5,
            bottom: 0.5,
            header: 0.3,
            footer: 0.3
        };

        XLSX.utils.book_append_sheet(wb, ws, "Senarai Aduan");
        XLSX.writeFile(wb, 'Senarai_Aduan_Pengguna.xlsx');
        
        console.log("Excel export successful");
    } catch (error) {
        console.error('Error exporting to Excel:', error);
        alert('Error exporting to Excel. Please try again.');
    }
}

// Add PDF export functionality
function exportToPDF() {
    try {
        // Get table data
        const table = document.getElementById('aduanTable');
        
        // Configure PDF options
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF({
            orientation: 'landscape',
            unit: 'mm',
            format: 'a4'
        });
        
        // Add title
        doc.setFontSize(16);
        doc.text('Senarai Aduan Pengguna', doc.internal.pageSize.getWidth() / 2, 15, { align: 'center' });
        
        // Create table data manually for better control
        const tableData = getTableData();
        const headers = getTableHeaders();
        
        // Set up table configuration
        const tableConfig = {
            head: [headers],
            body: tableData,
            startY: 25,
            headStyles: {
                fillColor: [196, 215, 255],
                textColor: [0, 0, 0],
                fontStyle: 'bold',
                halign: 'center'
            },
            styles: {
                fontSize: 7,
                cellPadding: 2,
                lineWidth: 0.25,
                valign: 'middle'
            },
            columnStyles: {
                0: { cellWidth: 8 },     // Bil
                1: { cellWidth: 25 },    // Kategori
                2: { cellWidth: 20 },    // Tarikh
                3: { cellWidth: 30 },    // Nama Dan Jawatan
                4: { cellWidth: 25 },    // Jenis Aset
                5: { cellWidth: 25 },    // Nombor Siri
                6: { cellWidth: 25 },    // Tempat Rosak
                7: { cellWidth: 25 },    // Pengguna Terakhir
                8: { cellWidth: 30 },    // Perihal Kerosakan
                9: { cellWidth: 20 }     // Disahkan
            }
        };
        
        // Auto-calculate column widths by content
        doc.autoTable(tableConfig);
        
        // Save the PDF
        doc.save('Senarai_Aduan_Pengguna.pdf');
        
        console.log("PDF export successful");
    } catch (error) {
        console.error('Error exporting to PDF:', error);
        alert('Error exporting to PDF. Please try again.');
    }
}
</script>