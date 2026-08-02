<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $profileName }} | Resume</title>
    <style>
        /*
         * dompdf-safe stylesheet: no Tailwind, no external JS, no icon fonts.
         * Tables are used for the two-column layout because dompdf renders
         * equal-height table cells reliably; flexbox/grid support is partial
         * (flex-wrap in particular does NOT reliably wrap in dompdf — that
         * was why every skill chip was landing on its own line and pushing
         * Education onto page 2). Skill chips now use an inline-block
         * 2-column grid instead, which dompdf wraps correctly.
         */
        @page {
            margin: 14mm 12mm 14mm 12mm;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: "DejaVu Sans", Helvetica, Arial, sans-serif;
            font-size: 10px;
            color: #1e293b;
            line-height: 1.45;
        }
        h1, h2, h3 { margin: 0; }
        p { margin: 0; }
        a { color: inherit; text-decoration: none; }

        /* ---------- Header ---------- */
        .header {
            background: #101a33;
            color: #ffffff;
            padding: 14px 18px;
            border-radius: 10px;
            page-break-inside: avoid;
        }
        .header table { width: 100%; border-collapse: collapse; }
        .header .photo-cell { width: 66px; vertical-align: middle; }
        .header .photo {
            width: 58px;
            height: 58px;
            border-radius: 50%;
            border: 2px solid #f2a93b;
        }
        .header .info-cell { vertical-align: middle; padding-left: 14px; }
        .header .name { font-size: 19px; font-weight: bold; letter-spacing: 0.3px; }
        .header .designation { margin-top: 2px; font-size: 10px; color: #cbd5e1; }
        .header .contacts { margin-top: 8px; font-size: 8.5px; color: #dbeafe; }
        .header .contacts span { margin-right: 14px; white-space: nowrap; }

        /* ---------- Two column layout ---------- */
        .layout { width: 100%; border-collapse: collapse; margin-top: 10px; }
        .layout > tbody > tr > td { vertical-align: top; }
        .sidebar {
            width: 33%;
            background: #f7f8fa;
            border-radius: 10px;
            padding: 12px 12px;
        }
        .main {
            width: 67%;
            padding: 2px 0 0 16px;
        }

        /* ---------- Shared block styles ---------- */
        .block { margin-bottom: 11px; page-break-inside: avoid; }
        .eyebrow {
            font-size: 7.5px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            color: #f2a93b;
        }
        .block-title {
            font-size: 12px;
            font-weight: bold;
            color: #0f172a;
            margin-top: 2px;
            margin-bottom: 7px;
        }

        /*
         * Skill chips — scalable 2-column grid via inline-block.
         * font-size:0 on the wrapper kills the whitespace gap dompdf/browsers
         * insert between inline-block elements; it's restored per-chip.
         * Width 48% + 2% left margin (0 on odd chips) = a clean 2-up grid
         * that keeps scaling no matter how many skills you add — it just
         * grows downward instead of overflowing sideways or one-per-line.
         */
        .chip-wrap { font-size: 0; }
        .chip {
            display: inline-block;
            /*width: 48%;*/
            box-sizing: border-box;
            margin: 2px 2% 2px 0;
            vertical-align: top;
            border: 1px solid #dbe1ea;
            background: #ffffff;
            border-radius: 6px;
            padding: 3px 6px;
            font-size: 7.5px;
            line-height: 1.35;
            color: #33415c;
            white-space: normal;
            word-break: break-word;
        }
        .chip:nth-of-type(2n+1) { margin-left: 0; }
        .chip.accent { border-color: #f2c98a; background: #fdf3e2; color: #8a5a12; }

        /* Education / detail cards */
        .card {
            border: 1px solid #e2e8f0;
            background: #ffffff;
            border-radius: 8px;
            padding: 7px 10px;
            margin-bottom: 6px;
            page-break-inside: avoid;
        }
        .card .row { width: 100%; }
        .edu-degree { font-size: 9.5px; font-weight: bold; color: #0f172a; }
        .edu-year { font-size: 7.5px; color: #94a3b8; float: right; }
        .edu-institution { font-size: 8.5px; color: #475569; margin-top: 1px; }
        .cgpa-badge {
            display: inline-block;
            margin-top: 4px;
            background: #2563eb;
            color: #ffffff;
            font-size: 7.5px;
            font-weight: bold;
            border-radius: 10px;
            padding: 2px 7px;
        }

        .detail-row { margin-bottom: 5px; }
        .detail-label { font-size: 7px; text-transform: uppercase; letter-spacing: 0.5px; color: #94a3b8; }
        .detail-value { font-size: 9px; color: #1e293b; font-weight: bold; }

        /* Summary box */
        .summary-box {
            background: #f1f6ff;
            border: 1px solid #dce7fb;
            border-radius: 8px;
            padding: 10px 12px;
            font-size: 9.2px;
            color: #334155;
            line-height: 1.55;
        }

        /* Experience */
        .exp-item {
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 8px 11px;
            margin-bottom: 7px;
            page-break-inside: avoid;
        }
        .exp-role { font-size: 10.5px; font-weight: bold; color: #0f172a; }
        .exp-current {
            float: right;
            background: #10b981;
            color: #ffffff;
            font-size: 7px;
            font-weight: bold;
            border-radius: 10px;
            padding: 2px 7px;
            text-transform: uppercase;
        }
        .exp-company { font-size: 9px; font-weight: bold; color: #2563eb; margin-top: 1px; }
        .exp-meta { font-size: 7.5px; color: #94a3b8; margin-top: 3px; }
        .exp-desc { font-size: 8.8px; color: #475569; margin-top: 4px; line-height: 1.5; }

        /* ---------- Page 2 : Portfolio ---------- */
        .page-break { page-break-before: always; }
        .portfolio-title {
            font-size: 15px;
            font-weight: bold;
            color: #0f172a;
            margin-bottom: 4px;
        }
        .portfolio-sub {
            font-size: 9px;
            color: #94a3b8;
            margin-bottom: 14px;
        }
        .category-block {
            margin-bottom: 12px;
            page-break-inside: avoid;
        }
        .category-name {
            font-size: 10.5px;
            font-weight: bold;
            color: #101a33;
            background: #f7f8fa;
            border-left: 3px solid #f2a93b;
            padding: 5px 9px;
            margin-bottom: 6px;
        }
        .project-line { font-size: 9.2px; color: #334155; padding: 2px 0 2px 12px; }
        .project-line .name { font-weight: bold; color: #0f172a; }
        .project-line .desc { color: #64748b; }
        .project-line .url { color: #2563eb; }

        .footer-note {
            margin-top: 18px;
            font-size: 8px;
            color: #94a3b8;
            text-align: center;
        }
    </style>
</head>
<body>

<!-- ===== PAGE 1 ===== -->
<div class="header">
    <table>
        <tr>
            <td class="photo-cell">
                <img src="{{ $profileImage }}" class="photo" alt="{{ $profileName }}">
            </td>
            <td class="info-cell">
                <div class="name">{{ strtoupper($profileName) }}</div>
                <div class="designation">{{ $designation }}</div>
                <div class="contacts">
                    @foreach($contactCards as $card)
                        <span>{{ $card['value'] }}</span>
                    @endforeach
                </div>
            </td>
        </tr>
    </table>
</div>

<table class="layout">
    <tr>
        <td class="sidebar">
            <div class="block">
                <div class="eyebrow">Skills</div>
                <div class="block-title">Technical Skills</div>
                <div class="chip-wrap">
                    @foreach($skills as $skill)
                        <span class="chip">{{ $skill->name }}</span>
                    @endforeach
                    @foreach($tools as $tool)
                        <span class="chip">{{ $tool->name }}</span>
                    @endforeach
                </div>
            </div>

            @if(!empty($personalDetails))
                <div class="block">
                    <div class="eyebrow">Personal</div>
                    <div class="block-title">Personal Details</div>
                    @foreach($personalDetails as $detail)
                        <div class="detail-row">
                            <div class="detail-label">{{ $detail['label'] }}</div>
                            <div class="detail-value">{{ $detail['value'] }}</div>
                        </div>
                    @endforeach
                </div>
            @endif
        </td>

        <td class="main">
            <div class="block">
                <div class="eyebrow">Summary</div>
                <div class="block-title">Professional Summary</div>
                <div class="summary-box">{{ $careerSummary }}</div>
            </div>

            @if(!empty($experiences))
                <div class="block">
                    <div class="eyebrow">Experience</div>
                    <div class="block-title">Professional Experience</div>
                    @foreach($experiences as $exp)
                        <div class="exp-item">
                            @if(!empty($exp['current']))
                                <span class="exp-current">Current</span>
                            @endif
                            <div class="exp-role">{{ $exp['role'] }}</div>
                            <div class="exp-company">{{ $exp['company'] }}</div>
                            <div class="exp-meta">{{ $exp['period'] }} &nbsp;|&nbsp; {{ $exp['location'] }}</div>
                            <div class="exp-desc">{{ $exp['description'] }}</div>
                        </div>
                    @endforeach
                </div>
            @endif

            @if($educations->isNotEmpty())
                <div class="block">
                    <div class="eyebrow">Education</div>
                    <div class="block-title">Academic Background</div>
                    @foreach($educations as $education)
                        <div class="card">
                            <div class="row">
                                <span class="edu-year">{{ $education->year }}</span>
                                <div class="edu-degree">{{ $education->degree }}</div>
                            </div>
                            <div class="edu-institution">{{ $education->institution }}</div>
                            <div class="cgpa-badge">CGPA {{ $education->cgpa }} / {{ $education->out_of_cgpa }}</div>
                        </div>
                    @endforeach
                </div>
            @endif
        </td>
    </tr>
</table>

<!-- ===== PAGE 2 : Portfolio & Projects ===== -->
<div class="page-break"></div>

<div class="portfolio-title">Portfolio &amp; Projects</div>
<div class="portfolio-sub">A selection of shipped work, grouped by service category.</div>

@foreach($categories as $category)
    @php $categoryProjects = $projects->where('category_id', $category->id); @endphp
    @if($categoryProjects->count())
        <div class="category-block">
            <div class="category-name">{{ $category->name }}</div>
            @foreach($categoryProjects as $project)
                @php
                    $host = $project->url ? parse_url($project->url, PHP_URL_HOST) : null;
                    $host = $host ? preg_replace('/^www\./', '', $host) : null;
                @endphp
                <div class="project-line">
                    <span class="name">{{ $project->name }}</span>
                    @if($project->short_description)
                        — <span class="desc">{{ $project->short_description }}</span>
                    @endif
                    @if($host)
                        &nbsp;<span class="url">(<a href="{{ $project->url }}" target="_blank">{{ $host }}</a>)</span>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
@endforeach

<div class="footer-note">
    {{ $profileName }} &middot; {{ $designation }} &middot; Generated {{ now()->format('F Y') }}
</div>

</body>
</html>
