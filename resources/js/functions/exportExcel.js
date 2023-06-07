import * as XLSX from 'xlsx'
const exportExcel = async (title, data) => {
  let dataJson = XLSX.utils.json_to_sheet(data)
  const workbook = XLSX.utils.book_new()
  const filename = title
  XLSX.utils.book_append_sheet(workbook, dataJson, filename)
  XLSX.writeFile(workbook, `${filename}.xlsx`)
}

export default exportExcel