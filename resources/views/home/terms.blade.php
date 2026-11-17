<x-guest.layout
    title="Terms of use & risk disclosure"
    description="PrimesLedger terms of use, trading policies, account management rules, refund policy and full risk disclosure, including company information for MCF Group FZCO and RSRD Limited."
    robots="index,follow"
    image="assets/guest/img/planning-session.jpg">

    <section class="page-hero">
        <div class="container page-hero__inner">
            <div>
                <nav class="breadcrumb" aria-label="Breadcrumb">
                    <a href="{{ url('/') }}">Home</a>
                    <x-guest.icon name="chevron-down" :size="13" style="transform: rotate(-90deg)" />
                    <span aria-current="page">Terms &amp; risk</span>
                </nav>

                <p class="eyebrow">Legal</p>
                <h1>Terms of use &amp; risk disclosure.</h1>
                <p class="lead">
                    These terms set out how the PrimesLedger Trading Evaluation and platform are
                    provided, the rules that apply to trading activity, the refund position and the
                    risks you accept when you use the service.
                </p>
            </div>

            <aside class="page-hero__aside" aria-label="Summary">
                <p>Read before you commit</p>
                <ul>
                    <li><x-guest.icon name="alert" :size="15" /> Trading can result in significant loss</li>
                    <li><x-guest.icon name="alert" :size="15" /> Past or simulated performance is not predictive</li>
                    <li><x-guest.icon name="alert" :size="15" /> Product terms in your account apply in addition</li>
                </ul>
            </aside>
        </div>
    </section>

    <section class="section">
        <div class="container legal-layout">
            <aside class="toc" aria-label="On this page">
                <p class="toc__title">On this page</p>
                <nav>
                    <a href="#scope">Scope &amp; company information</a>
                    <a href="#objectives">Evaluation objectives</a>
                    <a href="#trading-policies">Trading policies &amp; rules</a>
                    <a href="#account-management">Account management</a>
                    <a href="#forbidden-practices">Forbidden practices</a>
                    <a href="#liability">Indemnity &amp; liability</a>
                    <a href="#refund-policy">Refund policy</a>
                    <a href="#term">Term of agreement</a>
                    <a href="#commissions">Programme &amp; commissions</a>
                    <a href="#risk-disclosure">Risk disclosure</a>
                    <a href="#approval">Approval &amp; governing law</a>
                </nav>
                <p class="toc__meta">
                    Last reviewed {{ date('F Y') }}. If anything is unclear, contact
                    <a href="mailto:{{ config('app.Admin_email') }}">{{ config('app.Admin_email') }}</a>
                    before subscribing or trading.
                </p>
            </aside>

            <div class="legal">
                <div class="legal__intro">
                    <strong>Important.</strong> These terms describe the PrimesLedger Trading
                    Evaluation programme and the use of the platform. Some products have their own
                    terms, fee schedules and risk statements shown in your account before confirmation;
                    those product terms apply in addition to this agreement. Nothing on this page is
                    personal investment, legal or tax advice.
                </div>

                {{-- ---------------------------------------------------------- --}}
                <section id="scope">
                    <h2><span class="num">01</span> Scope &amp; company information</h2>

                    <p>
                        {{ config('app.name') }} Trading Evaluation (referred to in this document as
                        “{{ config('app.name') }} Evaluation”, “{{ config('app.name') }} Trading
                        Evaluation”, “MCF Group FZCO”, “Evaluation”, and/or “we”, “our” or “us”) is
                        operated under the name MCF Group FZCO and RSRD Limited.
                    </p>

                    <div id="company-information">
                        <h3>Company information</h3>
                        <ul>
                            <li>
                                <strong>MCF Group FZCO</strong> — registered at IFZA Business Park,
                                DDP-001, A1-3641379065, Dubai, United Arab Emirates.
                                Registration No. DSCO-FZCO-24876.
                            </li>
                            <li>
                                <strong>RSRD Limited</strong> — registered at Suite C, Level 7,
                                World Trust Tower, 50 Stanley Street, Central, Hong Kong.
                            </li>
                        </ul>
                    </div>

                    <p>
                        MCF Group FZCO and RSRD Limited evaluate and recommend traders to Evaluator,
                        the third-party proprietary trading company (referred to as “Evaluator” or
                        “Proprietary Trading Company”). All access to and use of the services is subject
                        to the General Terms and Conditions and these Trading Policies and Rules
                        (together, the “Terms of Use”, “Terms” or this “Agreement”).
                    </p>

                    <p>
                        For your benefit and protection, it is mandatory that you take enough time to
                        read and understand this entire Agreement, as well as any additional information
                        available on this website and in the Client Section (the “Website”), before
                        subscribing to any services, enrolling in the Evaluation or paying any fees.
                    </p>

                    <p>
                        You must read, agree with and accept all the terms and conditions contained in
                        this Agreement without modification. If you do not understand any part of this
                        Agreement or any information available on the Website, you should contact us
                        before subscribing to the service and taking part in the Evaluation, or seek
                        independent legal advice.
                    </p>

                    <h3>1.1 Parties</h3>
                    <p>
                        This Agreement is made between you, as our user (“you”, “your”, “trader” or
                        “user”) and {{ config('app.name') }} Trading Evaluation. This Agreement describes
                        in full detail the Terms of Use you must accept, without restrictions or
                        objections, before registering with us. By registering, you acknowledge that you
                        have read and fully understand these Terms of Use.
                    </p>

                    <h3>1.2 Trading</h3>
                    <p>
                        It is important to understand that under this programme we are looking for users
                        who can generate stable and consistent performance. You agree not to trade with
                        “unreasonable” risk or gambling-like strategies. All trading activity will be
                        monitored in real time to confirm that you adhere to the restrictions and
                        guidelines below. Failure to do so may end our relationship immediately and
                        result in forfeiture of any fees paid or profits due.
                    </p>
                </section>

                {{-- ---------------------------------------------------------- --}}
                <section id="objectives">
                    <h2><span class="num">02</span> Evaluation objectives</h2>
                    <p>A detailed explanation of the evaluation objectives follows.</p>

                    <h3>Trading period</h3>
                    <p>
                        The trading period starts any time you open your first position and ends after
                        completing the objectives, or when the trader violates any trading rule,
                        objective, or general terms and conditions.
                    </p>

                    <h3>Maximum loss</h3>
                    <p>
                        This rule can also be called the “account stop-loss”.
                    </p>
                    <ul>
                        <li><strong>2-step:</strong> maximum loss is -10% of the initial account balance.</li>
                        <li><strong>1-step:</strong> maximum loss is -5% of the initial account balance, relative to the highest recorded balance.</li>
                    </ul>

                    <h3>Maximum daily loss</h3>
                    <p>
                        This rule can also be called the “trader’s daily stop-loss”. At any moment of the
                        day (EET/EEST — Eastern European Time / Eastern European Summer Time), the daily
                        equity decrease must not hit the predetermined limit.
                    </p>
                    <ul>
                        <li><strong>2-step:</strong> maximum daily loss is -5% of the initial account balance, relative to the start-of-day balance.</li>
                        <li><strong>1-step:</strong> maximum daily loss is -4% of the initial account balance, relative to the start-of-day balance.</li>
                    </ul>

                    <h3>Profit target</h3>
                    <p>
                        The minimum profit target to complete a phase is set between 5% and 10% of the
                        initial balance. All positions must be closed.
                    </p>
                    <ul>
                        <li><strong>2-step:</strong> profit target is 10% for Phase 1 and 5% for Phase 2, with all positions closed.</li>
                        <li><strong>1-step:</strong> profit target is 10% of the initial account balance, with all positions closed.</li>
                    </ul>

                    <div class="legal__callout">
                        <strong>Scope note.</strong> The objectives above relate to the Trading Evaluation
                        programme. Different PrimesLedger products, including AI strategy plans, signal
                        plans, staking and real estate, have their own amounts, durations and risk terms.
                        The product terms displayed in your account at the point of confirmation govern
                        that product.
                    </div>
                </section>

                {{-- ---------------------------------------------------------- --}}
                <section id="trading-policies">
                    <h2><span class="num">03</span> Trading policies &amp; rules</h2>

                    <h3>1.2.1 Automated tools and copying</h3>
                    <p>
                        Users may not use any expert advisors (EAs), scripts or robots unless the
                        {{ config('app.name') }} Trading Evaluation Risk Team has granted an exception.
                        Nor may users follow other users’ entry and exit signals manually or through copy
                        trading. {{ config('app.name') }} may deem that users coordinate or copy trades if
                        several users trade the same instruments in the same direction within one minute
                        of each other, or if all traded instruments, entries and exits are identical or
                        similar. Failing to comply will result in termination of all
                        {{ config('app.name') }} accounts owned by the user. All trades must be based on
                        the user’s own analysis and decisions.
                    </p>

                    <h3>1.2.2 Providing signals to third parties</h3>
                    <p>
                        The user is not allowed to provide trading signals from a
                        {{ config('app.name') }} Trading Evaluation account, or from the
                        {{ config('app.name') }} Trading Programme account, in any format (digital or
                        manual) to third parties or any other {{ config('app.name') }} accounts without
                        {{ config('app.name') }} approval.
                    </p>

                    <h3>1.2.3 News event trading</h3>
                    <p>
                        News event trading is allowed in the {{ config('app.name') }} Trading Evaluation.
                        Please remember that high-impact news can affect instruments that are not
                        directly correlated to the country releasing its economic data.
                    </p>

                    <h3>1.2.4 Responsible and consistent strategy</h3>
                    <p>
                        The user’s strategy must be responsible and consistent during the whole trading
                        period. Trading must demonstrate that the strategy works in the long term and is
                        not based on pure luck. If the user places an unusually large number of orders
                        within an unreasonably short period, or places unusually large or small orders
                        compared with previous trades, it will be considered harmful or gambling
                        behaviour.
                    </p>
                    <p>
                        To specify the limit of what is considered a large order, a user may not risk
                        more than 2.00% of the initial account balance on one trade idea, including split
                        positions. Split positions considered as one trade idea are: (1) trades on the
                        same symbol that are floating or open at the same time at one point in the same
                        direction; and (2) trades on the same symbol and direction that were closed and
                        opened within two minutes of each other.
                    </p>
                    <p>
                        In such cases, the Provider reserves the right to suspend any further orders and
                        to terminate the user’s account. If unusual behaviour relates to involvement in
                        Forbidden Trading Practices, we may take the actions described in Section 5 of
                        the General Terms and Conditions. The Provider reserves the right to determine,
                        at its sole discretion, the nature of the behaviour described above and
                        reasonable boundaries for that determination.
                    </p>

                    <h3>1.2.5 Trading instruments</h3>
                    <p>
                        {{ config('app.name') }} Trading Evaluation includes all instruments available on
                        the MetaTrader application.
                    </p>

                    <h3>1.2.6 Closing positions</h3>
                    <p>
                        All positions must be closed before the trading period ends and before the
                        trading period can be reviewed.
                    </p>

                    <h3>1.2.7 Exceptions</h3>
                    <p>
                        Based on your individual trading methods, it may be possible to be granted an
                        exception. Exceptions are granted only after an interview with our Risk
                        Management team. Without a granted exception, users who take unreasonable risks
                        may face termination of our relationship.
                    </p>
                </section>

                {{-- ---------------------------------------------------------- --}}
                <section id="account-management">
                    <h2><span class="num">04</span> Account management &amp; right of refusal</h2>

                    <p>
                        The Company has the right to conclude the contract for the
                        {{ config('app.name') }} Trading Evaluation account with the Customer during any
                        part of the Trading Evaluation. Should any concerns about user activity or
                        excessive risk arise on any account, the Company will attempt to contact the user
                        immediately to conduct an interview and discuss the trading practices employed.
                        The Company will attempt to find a remedy. However, if there is no remedy for the
                        concerns, the Company reserves the right to terminate this Agreement
                        immediately. Such concerns may include:
                    </p>
                    <ul>
                        <li>The Company’s potential for suffering financial losses.</li>
                        <li>Investors of the Company’s potential for suffering financial losses.</li>
                        <li>The potential damage to the Company’s reputation due to unreasonable use of the platform.</li>
                    </ul>

                    <h3>2.4 Protection of capital</h3>
                    <p>
                        The Evaluator is under a contractual obligation to protect company funds at all
                        times. Should the Company suspect that the user’s practices on a demo account
                        would not be replicable in live market conditions, the Company reserves the right
                        to terminate the contractual relationship with the user.
                    </p>

                    <h3>2.5 Termination due to concerns, trading violations and ethics</h3>
                    <p>
                        Any of the following violations will result in immediate termination of our
                        contractual relationship unless you are able to justify the occurrence:
                    </p>
                    <ul>
                        <li>
                            Any form of arbitrage performed in your trading account — for example,
                            specialised software designed to exploit possible price latencies on a
                            trading platform, or technological and/or algorithmic trading patterns aimed
                            at exploiting price latency or price freezes for arbitrage opportunities,
                            resulting in unrealistic and/or fake profits that would not be possible in the
                            real trading environment.
                        </li>
                        <li>
                            Any form of HFT or HFT-like trading system. These are not applicable to live
                            market conditions due to latency, commission, spread and slippage limits.
                        </li>
                        <li>
                            Any form of martingale or grid trading strategy, due to its nature of high
                            leverage and high risk over a large series of trades.
                        </li>
                        <li>
                            Abuse of technological issues of a broker, intentional or otherwise, where
                            opening and closing prices might be readjusted and users continue trading.
                            Such data will not be taken into account for passing qualification.
                        </li>
                        <li>
                            Use of guaranteed “Take Profit” and “Stop Loss” orders to trade news, price
                            and weekend gaps, due to the possibility of doing so in a demo account.
                        </li>
                    </ul>

                    <h3>2.6 Difference between demo and real accounts</h3>
                    <p>
                        The user confirms a good understanding of the major differences between live and
                        demo trading, which include but are not limited to the following. In most cases,
                        demo accounts have better prices and abnormal execution behaviour relative to
                        the markets. A user must therefore consider that an employed trading system
                        should be able to perform profitably in a real market scenario, even with a
                        slightly less favourable spread.
                    </p>
                    <p>
                        Demo accounts have no or very little (artificial) slippage because there is no
                        real liquidity. Unlike demo accounts, real accounts with trades over one standard
                        lot might not be filled immediately or fully. On a real account, “Stop Loss” and
                        “Take Profit” are filled only at the level of the closest available liquidity,
                        not at the level of a set price. Orders on demo accounts are executed at the
                        quoted price, whereas the quoted price of a real account displays the last
                        available quote of an instrument, not necessarily the available quote.
                    </p>
                </section>

                {{-- ---------------------------------------------------------- --}}
                <section id="forbidden-practices">
                    <h2><span class="num">05</span> Forbidden trading practices</h2>

                    <h3>3.1 During demo trading, it is prohibited to:</h3>
                    <ul>
                        <li>Knowingly or unknowingly use trading strategies that exploit errors in the services, such as errors in the display of prices or delay in their update.</li>
                        <li>Perform trades using an external or slow data feed.</li>
                        <li>
                            Perform, alone or in concert with any other persons — including between
                            connected accounts or accounts held with different
                            {{ config('app.name') }} entities — trades or combinations of trades whose
                            purpose is to manipulate trading, for example by simultaneously entering into
                            opposite positions.
                        </li>
                        <li>Perform trades in contradiction with the terms and conditions of the Provider and the trading platform.</li>
                        <li>
                            Use any software, artificial intelligence, ultra-high speed or mass data
                            entry which might manipulate, abuse or give you an unfair advantage when using
                            our systems or services.
                        </li>
                        <li>
                            Otherwise perform trades in contradiction with how trading is actually
                            performed in any financial market, or in a way that establishes justified
                            concerns that the Provider might suffer financial or other harm as a result of
                            the Customer’s activities.
                        </li>
                    </ul>

                    <h3>3.2 Market-standard risk management</h3>
                    <p>
                        The Customer shall not exploit the services by performing trades without
                        applying market-standard risk management rules for trading on financial markets.
                        This includes, among others: (i) opening substantially larger position sizes
                        compared with the Customer’s other trades, whether on this or any other
                        Customer’s account; or (ii) opening a substantially smaller or larger number of
                        positions compared with the Customer’s other trades, whether on this or any other
                        Customer’s account. The Provider reserves the right to determine, at its sole
                        discretion, whether certain trades, practices, strategies or situations are
                        Forbidden Trading Practices.
                    </p>

                    <h3>3.3 Consequences</h3>
                    <p>
                        If the Customer engages in any Forbidden Trading Practices described in clause
                        5.4: (i) the Provider may consider it a failure to meet the conditions of the
                        particular {{ config('app.name') }} Trading Evaluation or Verification;
                        (ii) the Provider may remove the transactions that violate the prohibition from
                        the Customer’s trading history and/or not count their results in the profits
                        and/or losses achieved by the demo trading; or (iii) immediately cancel all
                        services provided to the Customer and subsequently terminate this Agreement.
                    </p>

                    <h3>3.4 Multiple accounts</h3>
                    <p>
                        Where some or all Forbidden Trading Practices are executed on one or more
                        {{ config('app.name') }} Trading Evaluation and Verification accounts of one
                        Customer, or accounts of various Customers, or by combining trading through
                        {{ config('app.name') }} Trading Evaluation and Verification accounts and
                        {{ config('app.name') }} Trader accounts, the Provider is entitled to cancel all
                        services and terminate all respective contracts related to any and all of the
                        Customer’s {{ config('app.name') }} Trading Evaluation and Verification accounts.
                        The Provider may exercise any and all actions in clauses 5.5 and 5.6 at its own
                        discretion.
                    </p>

                    <h3>3.5 Third-party accounts</h3>
                    <p>
                        If any {{ config('app.name') }} user accounts were used for or involved in
                        Forbidden Trading Practices, this may and will constitute a breach of the
                        respective terms and conditions for the {{ config('app.name') }} user account
                        with a third-party provider and may result in cancellation of all such user
                        accounts and termination of the respective agreements by the third-party
                        provider.
                    </p>

                    <h3>3.6 Repeated practices</h3>
                    <p>
                        If the Customer engages in any of the practices described in clause 5.4
                        repeatedly, and the Provider has previously notified the Customer, the Provider
                        may prevent the Customer from accessing all services or parts of them, including
                        access to the Client Section and trading platform, without compensation. In such
                        a case, the Customer is not entitled to a refund of fees paid.
                    </p>

                    <h3>3.7 Activity outside the relationship</h3>
                    <p>
                        The Provider does not bear responsibility for trading or other investment
                        activities performed by the Customer outside the relationship with the Provider,
                        for example by using data or other information from the Client Section, trading
                        platform or otherwise related to the services in real trading on financial
                        markets — even if the Customer uses the same trading platform used for demo
                        trading.
                    </p>

                    <h3>3.8 Market risk</h3>
                    <p>
                        Developments in financial markets are subject to frequent and abrupt changes.
                        Trading on financial markets may not be profitable and can lead to significant
                        financial losses. Any previous performance and profits from the Customer’s demo
                        trading are not a guarantee or indication of any further performance.
                    </p>
                </section>

                {{-- ---------------------------------------------------------- --}}
                <section id="liability">
                    <h2><span class="num">06</span> Indemnity &amp; liability</h2>

                    <h3>4.1 Company liability</h3>
                    <p>
                        The Company shall not be liable to the user or to any third party except by
                        reason of acts that constitute gross negligence, bad faith, or intent to defraud
                        on behalf of the Company.
                    </p>

                    <h3>4.2 Indemnity</h3>
                    <p>
                        The user will indemnify, hold harmless and defend the Company and its members
                        against any liability, loss, cost, damage or expense, and any amount paid in
                        settlement, to which any of them may become subject in acting pursuant to or in
                        furtherance of this Agreement or in connection with any transaction for the
                        Account.
                    </p>

                    <h3>4.3 Technical issues and unusual market movements</h3>
                    <p>
                        The Company will not hold the user financially liable for any losses incurred on
                        the evaluation accounts which were the result of technical issues, or caused by
                        “unusual” market movements which could not be avoided with risk mitigation.
                    </p>

                    <h3>4.4 One profile per verified individual</h3>
                    <p>
                        Only one user profile per verified individual is permitted. One user
                        profile/verified individual can have multiple accounts. Users are not permitted
                        to allow others to use their account and may not use any other
                        {{ config('app.name') }} account. IP addresses, device IDs and behavioural data
                        maps will be used by the automated risk system as a basis for determining
                        unauthorised trading activity. All users must be contactable on the telephone
                        number and email provided during verification at any time a position is held in
                        the markets. {{ config('app.name') }} reserves the right to demand extra video
                        verification at any time. Failure to contact the user or to verify identity will
                        result in account suspension.
                    </p>
                </section>

                {{-- ---------------------------------------------------------- --}}
                <section id="refund-policy">
                    <h2><span class="num">07</span> Refund policy</h2>
                    <p>
                        The user has the right to cancel the ordered services within 14 days of
                        purchasing the services ({{ config('app.name') }} Trading Evaluation). The user is
                        aware and agrees that this does not apply after starting to use the services,
                        meaning opening the first trade on the Evaluation account.
                    </p>
                    <p>
                        Purchases of other products, including plan allocations, staking commitments,
                        real estate participations and virtual card issuance fees, are governed by the
                        terms shown on the relevant confirmation screen in your account.
                    </p>
                </section>

                {{-- ---------------------------------------------------------- --}}
                <section id="term">
                    <h2><span class="num">08</span> Term of the agreement</h2>
                    <p>
                        Either party may terminate this Agreement at any time upon at least five business
                        days’ prior written notice to the other via email or telephone.
                    </p>
                </section>

                {{-- ---------------------------------------------------------- --}}
                <section id="commissions">
                    <h2><span class="num">09</span> Evaluation programme &amp; user commissions</h2>
                    <p>
                        If the Customer is successful in both the Evaluation and Verification, the user
                        may be recommended to the {{ config('app.name') }} Trader Programme, the
                        proprietary trading platform operated by Evaluator, and may be offered a contract
                        by that third-party company.
                    </p>
                    <p>
                        To be accepted to the {{ config('app.name') }} Trader Programme, the user must
                        open an account with Evaluator, provide the required KYC documentation and sign
                        an agreement with the company. If accepted, the user can start trading at the
                        same initial account size as in the Trading Evaluation and can start earning
                        performance commissions according to the agreement signed with the Proprietary
                        Trading Company.
                    </p>
                    <p>
                        All users are compensated on a profit-split basis only. User performance
                        commission depends on the chosen programme, risk level and phase. The user may
                        request a withdrawal of their commission when their account balance on Evaluator
                        is at least $50 and when the payout schedule is due.
                    </p>
                    <p>
                        Payments will be made by wire transfer or any other payment method available with
                        Evaluator. Alternative payment methods may be available; however, the user must
                        ensure that bank transfers are receivable by the institution. The Evaluator will
                        not be responsible for failure to deliver a payout due to mistakes on the user’s
                        end, nor will payment be re-sent if a transfer is rejected by the receiving
                        foreign institution. The receiver may be charged by the payment system.
                    </p>
                </section>

                {{-- ---------------------------------------------------------- --}}
                <section id="risk-disclosure">
                    <h2><span class="num">10</span> Risk disclosure</h2>

                    <div class="legal__callout">
                        <strong>Trading and investing involve risk.</strong> The value of investments can
                        go down as well as up, and you may lose some or all of your capital. Target
                        returns, projections and staking estimates are not guarantees. Only commit funds
                        you can afford to lose.
                    </div>

                    <p>
                        All content published and distributed by MCF Group FZCO and RSRD Limited and its
                        affiliates (collectively, the “Company”) is intended solely for study purposes
                        related to trading on financial markets. It does not serve in any way as a
                        specific investment recommendation, business recommendation, investment
                        opportunity analysis or similar general recommendation regarding the trading of
                        investment instruments. Trading in financial markets is a high-risk activity and
                        it is advised not to risk more than one can afford to lose.
                    </p>

                    <p>
                        MCF Group FZCO and RSRD Limited do not provide any of the investment services
                        listed in the Capital Market Undertakings Act No. 256/2004 Coll. The information
                        in this document is not directed at residents in any country or jurisdiction
                        where such distribution or use would be contrary to local laws or regulations.
                        For the purposes of the Trading Evaluation, MCF Group FZCO and RSRD Limited is
                        not a broker and does not accept deposits under that programme. Platform services
                        are governed by the product terms presented in your account.
                    </p>

                    <p>MCF Group FZCO and RSRD Limited or its brokers may:</p>
                    <ul>
                        <li>Change margin requirements at any time in line with perceived or actual excessive changes in volatility and/or liquidity.</li>
                        <li>Cancel orders or trades at any time in line with the perceived or actual risk of non-execution of stop or limit orders due to market conditions.</li>
                        <li>Not be responsible for the variable spread, liquidity levels or limit order execution parameters provided by liquidity providers and market makers.</li>
                    </ul>

                    <h3>CFTC Rule 4.41</h3>
                    <p>
                        Hypothetical or simulated performance results have certain limitations. Unlike
                        an actual performance record, simulated results do not represent actual trading.
                        Because the trades have not actually been executed, the results may have under-
                        or over-compensated for the impact, if any, of certain market factors, such as
                        lack of liquidity. Simulated trading programmes are generally also subject to the
                        fact that they are designed with the benefit of hindsight. No representation is
                        being made that any account will or is likely to achieve profit or losses similar
                        to those shown.
                    </p>

                    <h3>Additional product risks</h3>
                    <ul>
                        <li><strong>Digital assets</strong> can be highly volatile and may be affected by network, custody and regulatory events.</li>
                        <li><strong>Staking</strong> terms can produce a loss as well as a gain, and assets may be unavailable until the term completes.</li>
                        <li><strong>Real estate</strong> is illiquid, values can fall, and income can be lower than targeted.</li>
                        <li><strong>Virtual cards</strong> are funded from your balance and remain subject to the card terms shown before issuance.</li>
                    </ul>
                </section>

                {{-- ---------------------------------------------------------- --}}
                <section id="approval">
                    <h2><span class="num">11</span> Approval &amp; governing law</h2>
                    <p>
                        The user has read, understood and agreed to the
                        {{ config('app.name') }} Evaluation terms and rules in this document, and to the
                        detailed explanation of evaluation rules and objectives published on this
                        website.
                    </p>
                    <p>
                        <strong>No provision of this Agreement may be waived or amended unless the waiver
                        or amendment is in writing and signed by the user and an authorised officer of
                        the Company. This Agreement is subject to the law of the UAE.</strong>
                    </p>
                    <p>
                        Questions about these terms can be sent to
                        <a href="mailto:{{ config('app.Admin_email') }}">{{ config('app.Admin_email') }}</a>
                        or through the <a href="{{ route('contact') }}">contact page</a>.
                    </p>
                </section>
            </div>
        </div>
    </section>
</x-guest.layout>
