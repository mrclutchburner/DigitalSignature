const generatePDF = () =>{
    let printable_area = document.querySelector(".printable_area").innerHTML;
    let style = "<style>";

    style = style + " *{font-family: 'Segoe UI'} ";
    style = style + " h1, h2{text-align: center; font-weight: 400; margin: 0;} ";
    style = style + " h2{ margin-bottom:8px} ";
    style = style + " th{ padding: 9px; font-weight: 400;} ";
    style = style + " table{ width: 90%; margin: 0 auto; border-bottom: 45px; border-collapse: collapse;}";
    style = style + " th{ padding: auto; font-weight: 500; font-size: larger;}";
    style = style + " td{ align-items: center; text-align: center; font-size: 16px;border: 1px solid #a7a7a7;}";
    style = style + "</style>";

    // Create window Object.

    let windowObj = window.open("", "", "width=900,height=100%");
    windowObj.document.write(style);
    windowObj.document.write(printable_area);
    windowObj.document.close();
    windowObj.print();
}