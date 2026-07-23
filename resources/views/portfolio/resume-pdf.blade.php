<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $profileName }} | Resume</title>
    <style>
        /*
         * dompdf-safe stylesheet: no Tailwind, no external JS, no icon fonts.
         * Tables are used for the two-column layout because dompdf renders
         * equal-height table cells reliably; flexbox/grid support is partial.
         */
        @page {
            margin: 16mm 14mm 16mm 14mm;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: "DejaVu Sans", Helvetica, Arial, sans-serif;
            font-size: 10.5px;
            color: #1e293b;
            line-height: 1.55;
        }
        h1, h2, h3 { margin: 0; }
        p { margin: 0; }
        a { color: inherit; text-decoration: none; }

        /* ---------- Header ---------- */
        .header {
            background: #101a33;
            color: #ffffff;
            padding: 18px 20px;
            border-radius: 10px;
            page-break-inside: avoid;
        }
        .header table { width: 100%; border-collapse: collapse; }
        .header .photo-cell { width: 74px; vertical-align: middle; }
        .header .photo {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            border: 2px solid #f2a93b;
        }
        .header .info-cell { vertical-align: middle; padding-left: 14px; }
        .header .name { font-size: 21px; font-weight: bold; letter-spacing: 0.3px; }
        .header .designation { margin-top: 3px; font-size: 10.5px; color: #cbd5e1; }
        .header .contacts { margin-top: 10px; font-size: 9px; color: #dbeafe; }
        .header .contacts span { margin-right: 16px; white-space: nowrap; }

        /* ---------- Two column layout ---------- */
        .layout { width: 100%; border-collapse: collapse; margin-top: 14px; }
        .layout > tbody > tr > td { vertical-align: top; }
        .sidebar {
            width: 33%;
            background: #f7f8fa;
            border-radius: 10px;
            padding: 16px 14px;
        }
        .main {
            width: 67%;
            padding: 2px 0 0 18px;
        }

        /* ---------- Shared block styles ---------- */
        .block { margin-bottom: 16px; page-break-inside: avoid; }
        .eyebrow {
            font-size: 8px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1.4px;
            color: #f2a93b;
        }
        .block-title {
            font-size: 13px;
            font-weight: bold;
            color: #0f172a;
            margin-top: 3px;
            margin-bottom: 10px;
        }

        /* Skill chips */
        .chip-wrap { }
        .chip {
            display: inline-block;
            border: 1px solid #dbe1ea;
            background: #ffffff;
            border-radius: 10px;
            padding: 3px 8px;
            margin: 0 5px 5px 0;
            font-size: 8.6px;
            color: #33415c;
        }
        .chip.accent { border-color: #f2c98a; background: #fdf3e2; color: #8a5a12; }

        /* Education / detail cards */
        .card {
            border: 1px solid #e2e8f0;
            background: #ffffff;
            border-radius: 8px;
            padding: 9px 11px;
            margin-bottom: 8px;
            page-break-inside: avoid;
        }
        .card .row { width: 100%; }
        .edu-degree { font-size: 10px; font-weight: bold; color: #0f172a; }
        .edu-year { font-size: 8px; color: #94a3b8; float: right; }
        .edu-institution { font-size: 9px; color: #475569; margin-top: 2px; }
        .cgpa-badge {
            display: inline-block;
            margin-top: 5px;
            background: #2563eb;
            color: #ffffff;
            font-size: 8px;
            font-weight: bold;
            border-radius: 10px;
            padding: 2px 8px;
        }

        .detail-row { margin-bottom: 7px; }
        .detail-label { font-size: 7.5px; text-transform: uppercase; letter-spacing: 0.6px; color: #94a3b8; }
        .detail-value { font-size: 9.5px; color: #1e293b; font-weight: bold; }

        /* Summary box */
        .summary-box {
            background: #f1f6ff;
            border: 1px solid #dce7fb;
            border-radius: 8px;
            padding: 12px 14px;
            font-size: 9.6px;
            color: #334155;
            line-height: 1.65;
        }

        /* Experience */
        .exp-item {
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 10px 12px;
            margin-bottom: 10px;
            page-break-inside: avoid;
        }
        .exp-role { font-size: 11px; font-weight: bold; color: #0f172a; }
        .exp-current {
            float: right;
            background: #10b981;
            color: #ffffff;
            font-size: 7.5px;
            font-weight: bold;
            border-radius: 10px;
            padding: 2px 8px;
            text-transform: uppercase;
        }
        .exp-company { font-size: 9.5px; font-weight: bold; color: #2563eb; margin-top: 2px; }
        .exp-meta { font-size: 8px; color: #94a3b8; margin-top: 4px; }
        .exp-desc { font-size: 9.2px; color: #475569; margin-top: 6px; line-height: 1.6; }

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
                    </div>
                </div>

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
                            &nbsp;<span class="url">({{ $host }})</span>
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
