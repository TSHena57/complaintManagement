<!DOCTYPE html>
<html>
<body style="font-family: Arial, sans-serif; background:#f4f4f4; padding:20px;">

    <!-- Email Container -->
    <div style="max-width:600px; margin:auto; background:white; border-radius:10px; overflow:hidden; box-shadow:0 0 10px rgba(0,0,0,0.1);">

        <!-- Header -->
        <div style="background:#4F46E5; padding:20px; text-align:center; color:white;">
            <h2 style="margin:0;">Student Information</h2>
            <p style="margin:0; font-size:14px;">Your submitted information is below</p>
        </div>

        <!-- Body -->
        <div style="padding:25px;">

            <p><strong>Name:</strong> {{ $data['name'] }}</p>
            <p><strong>Student ID:</strong> {{ $data['student_id'] }}</p>
            <p><strong>Batch:</strong> {{ $data['batch'] }}</p>
            <p><strong>Website:</strong> {{ $data['website'] }}</p>

            <br>

            <!-- Beautiful Button -->
            <a href="{{ $data['website'] }}"
               style="background:#4F46E5; padding:12px 25px; color:white; text-decoration:none; border-radius:6px; font-size:16px; display:inline-block;">
                Visit Website
            </a>

            <br><br>
            <p>If you didn't request this email, you can ignore it.</p>
        </div>

        <!-- Footer -->
        <div style="background:#f0f0f0; text-align:center; padding:12px; font-size:12px; color:#555;">
            © {{ date('Y') }} {{ config('app.name') }} — All rights reserved.
        </div>

    </div>

</body>
</html>
