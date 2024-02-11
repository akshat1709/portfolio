const fileUrl ='cv.pdf';

document.getElementById('downloadcv').addEventListener('click', function(){
    const link = document.createElement('a');
    link.href = fileUrl;

    link.setAttribute('download', 'cv.pdf');

    document.body.appendChild(link);

    link.click();

    document.body.removeChild(link);
});