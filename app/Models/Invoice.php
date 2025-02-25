<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use NumberFormatter;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'total_amount', 'payment_status', 'issued_date', 'payment_date'];

    protected $dates = ['issued_date', 'payment_date'];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    /**
     * تنسيق المبلغ كعملة بناءً على العملة المختارة.
     *
     * @param float $amount
     * @param string $currencyCode
     * @return string
     */
    public function formatCurrency($amount, $currencyCode)
    {
        // التحقق من توفر التمديد intl
        if (!class_exists('NumberFormatter')) {
            return number_format($amount, 2) . ' ' . $currencyCode; // استخدام التنسيق الافتراضي
        }

        // تحديد الـ locale بناءً على العملة
        $locale = match ($currencyCode) {
            'USD' => 'en_US',
            'EUR' => 'de_DE',
            'EGP' => 'ar_EG',
            'SYP' => 'ar_SY',
            default => 'en_US',
        };

        try {
            // استخدام NumberFormatter لتنسيق العملة
            $formatter = new NumberFormatter($locale, NumberFormatter::CURRENCY);
            return $formatter->formatCurrency($amount, $currencyCode);
        } catch (\Exception $e) {
            // في حال حدوث خطأ، نعرض التنسيق الافتراضي
            return number_format($amount, 2) . ' ' . $currencyCode;
        }
    }
}

