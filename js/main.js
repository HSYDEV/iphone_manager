document.addEventListener('DOMContentLoaded', function () {
    const table = document.querySelector('.table');
    if (table) {
        // تسليط الضوء على الصف عند تمرير المؤشر
        table.querySelectorAll('tbody tr').forEach(row => {
            row.addEventListener('mouseenter', () => row.style.backgroundColor = '#f9f9f9');
            row.addEventListener('mouseleave', () => row.style.backgroundColor = '');
        });
    }

    // تحسين تجربة الضغط على زر الحذف
    const deleteLinks = document.querySelectorAll('a[href*="delete.php"]');
    deleteLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            if (!confirm("⚠️ هل أنت متأكد أنك تريد حذف هذا الجهاز؟")) {
                e.preventDefault();
            }
        });
    });
});