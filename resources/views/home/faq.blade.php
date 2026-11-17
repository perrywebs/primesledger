<x-guest.layout
    title="Frequently asked questions"
    description="Answers about PrimesLedger accounts, verification, deposits, withdrawals, plans, staking, virtual cards, fees, security and risk."
    image="assets/guest/img/advisor.jpg">

    @php
        $faqs = [
            [
                'q' => 'What is PrimesLedger?',
                'a' => 'PrimesLedger is a digital finance platform for managing supported crypto assets, tracking account activity and exploring structured investment products such as AI strategy plans, signal plans, account status tiers, crypto staking, real estate opportunities and virtual cards.',
            ],
            [
                'q' => 'Is PrimesLedger a bank or a broker?',
                'a' => 'No. PrimesLedger is not a bank and does not provide deposit insurance. It is a digital finance platform, and the products offered carry market, liquidity and platform risk. Company and legal information is set out in the terms of use.',
            ],
            [
                'q' => 'Does it cost anything to open an account?',
                'a' => 'No. Account creation is free. Deposits and product participation are optional, and any fee for a product or service is shown before you confirm it.',
            ],
            [
                'q' => 'Who can open an account?',
                'a' => 'You must be old enough to enter a binding contract in your jurisdiction and must not be resident in a country where the service is restricted. Accounts are subject to identity verification and eligibility checks.',
            ],
            [
                'q' => 'What verification is required?',
                'a' => 'The platform asks for the identity and contact details shown during registration and may request supporting documents. Key account features can remain limited until verification is approved.',
            ],
            [
                'q' => 'Are returns guaranteed?',
                'a' => 'No. Target ROI figures, plan returns and staking estimates are not guarantees. Investments can fall in value, staking can produce a loss, and you may lose some or all of the capital you commit.',
            ],
            [
                'q' => 'How do I make a deposit?',
                'a' => 'Open the deposit screen in your account and use one of the supported methods shown there. Check the asset and network before sending funds. Only send supported assets through the instructed method.',
            ],
            [
                'q' => 'How long does a deposit take to appear?',
                'a' => 'Timing depends on the payment method and network conditions. A deposit is recorded once it is confirmed and, where required, reviewed. The status is visible in your deposit history.',
            ],
            [
                'q' => 'How do withdrawals work?',
                'a' => 'Submit a withdrawal request from your available balance. The request is recorded and reviewed before funds are released. You can follow its status in your withdrawal history.',
            ],
            [
                'q' => 'Why might a withdrawal be delayed?',
                'a' => 'Review can take longer when identity or account information is incomplete, when a security check is triggered, or when the relevant network is congested. Any network or payment provider fee is shown on the request screen.',
            ],
            [
                'q' => 'How does crypto staking work?',
                'a' => 'You choose a supported asset, an amount and a term of one to six days. When the term completes, the result is recorded against the stake. That result can be a profit or a loss.',
            ],
            [
                'q' => 'What are AI strategy plans?',
                'a' => 'AI strategy plans are fixed-duration allocations with a stated plan amount, duration and target ROI. The terms are shown before purchase. A target ROI is not a promise of performance.',
            ],
            [
                'q' => 'What are signal plans?',
                'a' => 'Signal plans provide access to market signal plans defined by amount, duration and stated signal strength. Signals are informational, and signal strength is not a probability of profit.',
            ],
            [
                'q' => 'What are account status plans?',
                'a' => 'Status plans are time-bound account tiers with a stated fee and duration. A status plan changes your account level for its term; it does not create a market return of its own.',
            ],
            [
                'q' => 'What should I know about real estate opportunities?',
                'a' => 'Each listing states a minimum participation, target ROI, strategy and supporting documents. Property is illiquid, values can fall and target returns are not guaranteed. Review the listing documents in full before committing capital.',
            ],
            [
                'q' => 'What does a virtual card cost?',
                'a' => 'A one-time issuance fee applies. The exact amount for your account is shown before you confirm; the platform default is $250. The card is funded from your available balance.',
            ],
            [
                'q' => 'Which cryptocurrencies are supported?',
                'a' => 'In-platform wallets are provided for Bitcoin (BTC), Ethereum (ETH), Tether (USDT), Solana (SOL), Polygon (MATIC) and XRP, with additional assets listed on the staking and wallet screens. Supported assets and networks can change, so check before sending funds.',
            ],
            [
                'q' => 'Is my balance insured?',
                'a' => 'PrimesLedger does not provide deposit insurance. Balances and product positions remain subject to platform, market and liquidity risk. This is why only funds you can afford to lose should be committed.',
            ],
            [
                'q' => 'How is my account protected?',
                'a' => 'Sign-in requires your email and password, password resets use a single-use email token, and withdrawal requests are reviewed. Keep your credentials private and contact support immediately if you notice unfamiliar activity.',
            ],
            [
                'q' => 'I forgot my password. What should I do?',
                'a' => 'Use the forgot password page. A single-use reset link is sent to the email registered on your account. If the message does not arrive, check your spam folder and then contact support.',
            ],
            [
                'q' => 'How do I contact support?',
                'a' => 'Use the contact page or email the support inbox listed on this site. Include your account email and a clear description of the issue; never send your password.',
            ],
        ];
    @endphp

    @push('head')
        <script type="application/ld+json">
            {!! json_encode([
                '@context' => 'https://schema.org',
                '@type' => 'FAQPage',
                'mainEntity' => collect($faqs)->map(fn ($item) => [
                    '@type' => 'Question',
                    'name' => $item['q'],
                    'acceptedAnswer' => ['@type' => 'Answer', 'text' => $item['a']],
                ])->all(),
            ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
        </script>
    @endpush

    <section class="page-hero">
        <div class="container page-hero__inner">
            <div>
                <nav class="breadcrumb" aria-label="Breadcrumb">
                    <a href="{{ url('/') }}">Home</a>
                    <x-guest.icon name="chevron-down" :size="13" style="transform: rotate(-90deg)" />
                    <span aria-current="page">FAQ</span>
                </nav>

                <p class="eyebrow">Support</p>
                <h1>Frequently asked questions.</h1>
                <p class="lead">
                    Practical answers about accounts, verification, funding, withdrawals, products,
                    fees and risk. If something is still unclear, contact the team before you commit
                    any capital.
                </p>

                <div class="quick-links" aria-label="Jump to a section">
                    <a href="#faq-1">Getting started</a>
                    <a href="#faq-7">Deposits &amp; withdrawals</a>
                    <a href="#faq-11">Products</a>
                    <a href="#faq-19">Security</a>
                    <a href="#risk">Risk</a>
                </div>
            </div>

            <aside class="page-hero__aside" aria-label="Support details">
                <p>Need a person?</p>
                <ul>
                    <li><x-guest.icon name="mail" :size="15" /> {{ config('app.Admin_email') }}</li>
                    <li><x-guest.icon name="message" :size="15" /> Use the contact form for account questions</li>
                    <li><x-guest.icon name="clock" :size="15" /> Include your account email, never your password</li>
                </ul>
            </aside>
        </div>
    </section>

    <section class="section" aria-labelledby="faq-main-title">
        <div class="container">
            <div class="section-head section-head--wide">
                <p class="eyebrow">The full list</p>
                <h2 class="h2" id="faq-main-title">Everything we can answer without knowing your account.</h2>
                <p class="lead">
                    Account-specific questions need a person. Everything general is below.
                </p>
            </div>

            <div class="faq" data-faq-accordion>
                @foreach ($faqs as $index => $faq)
                    <details class="faq__item" id="faq-{{ $index + 1 }}" @if ($index === 0) open @endif>
                        <summary>{{ $faq['q'] }}</summary>
                        <div class="faq__a">
                            <p>{{ $faq['a'] }}</p>
                        </div>
                    </details>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section section--muted" id="risk" aria-labelledby="risk-title">
        <div class="container">
            <div class="section-head section-head--wide">
                <p class="eyebrow">Risk</p>
                <h2 class="h2" id="risk-title">The one answer that matters most.</h2>
            </div>

            <div class="service-grid">
                <article class="service-card">
                    <span class="service-card__icon"><x-guest.icon name="alert" :size="21" /></span>
                    <div>
                        <h3>Capital can be lost</h3>
                        <p>
                            Digital assets and investment products can fall in value. Staking results
                            can be negative. There is no guarantee of profit and no deposit insurance.
                        </p>
                    </div>
                </article>
                <article class="service-card">
                    <span class="service-card__icon"><x-guest.icon name="scale" :size="21" /></span>
                    <div>
                        <h3>Read the terms in full</h3>
                        <p>
                            Product terms, the risk disclosure and company information are set out in
                            the <a href="{{ route('terms') }}">terms of use</a>. Product-specific terms
                            appear in your account before confirmation.
                        </p>
                    </div>
                </article>
            </div>

            <div class="callout callout--amber mt-32">
                <x-guest.icon name="alert" :size="17" />
                <p>
                    This FAQ is general information, not personal investment, legal or tax advice.
                    If you are unsure whether a product suits your circumstances, seek independent advice.
                </p>
            </div>

            <div class="mt-32">
                <a href="{{ route('contact') }}" class="btn btn--primary">
                    Contact support <x-guest.icon name="arrow-right" :size="16" />
                </a>
            </div>
        </div>
    </section>
</x-guest.layout>
