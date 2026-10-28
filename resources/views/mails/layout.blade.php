<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $sujet }}</title>
</head>
<body style="margin:0;padding:0;background:#eef4ff;font-family:'Segoe UI',Roboto,Arial,sans-serif;color:#0f172a;">
<table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="background:#eef4ff;padding:32px 12px;">
    <tr>
        <td align="center">
            <table width="600" cellpadding="0" cellspacing="0" role="presentation" style="max-width:600px;width:100%;background:#ffffff;border-radius:16px;overflow:hidden;box-shadow:0 10px 30px rgba(30,64,175,.12);">
                <tr>
                    <td style="background:#1e3a8a;background:linear-gradient(135deg,#0b1f4d 0%,#1d4ed8 55%,#06b6d4 100%);padding:32px 36px;color:#ffffff;">
                        <div style="font-size:13px;letter-spacing:2px;text-transform:uppercase;opacity:.8;">Traoré Mohamed · IT Prodiges</div>
                        <div style="font-size:22px;font-weight:700;margin-top:8px;line-height:1.3;">@yield('titre')</div>
                    </td>
                </tr>
                <tr>
                    <td style="padding:32px 36px;font-size:15px;line-height:1.65;">
                        @yield('contenu')
                    </td>
                </tr>
                <tr>
                    <td style="padding:20px 36px;background:#f1f6ff;font-size:12px;color:#475569;text-align:center;">
                        Traoré Mohamed — Ingénieur Logiciel &amp; Data · Chef de projet<br>
                        +225 07 09 49 51 98 · traoremohamed2g@gmail.com
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
