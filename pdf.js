const generatePDF = () =>{
    let printable_area = document.querySelector(".printable_area").innerHTML;
    let style = "<style>";

    style = style + " *{font-family: 'Segoe UI'} ";
    style = style + " h1, h2{text-align: center; font-weight: 400; margin: 0;} ";
    style = style + " h2{ margin-bottom:0px} ";
    style = style + " th{ padding: 0px; font-weight: 400;} ";
    style = style + " table{ width: 90%; margin: 0 auto; border-bottom: 0px; border-collapse: collapse;}";
    style = style + " th{ padding: auto; font-weight: 500; font-size: 12px;}";
    style = style + " td{ align-items: center; text-align: center; font-size: 12px;border: 0.5px solid #a7a7a7;}";
    style = style + " img{ height: 20px; width: auto;}";
    style = style + "</style>";

    // Create window Object.

    let windowObj = window.open("", "", "width=900px,height=900px");
    windowObj.document.write(style);
    windowObj.document.write(printable_area);
    windowObj.document.close();
    windowObj.print();
}