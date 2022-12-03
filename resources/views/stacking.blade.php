@extends('layouts.app')


@section('assets')
    <style>
        .stacking-section{
            width: 100%;
            min-height:100vh;
            padding-top: 40px;
            padding-left: 5px;
            padding-right: 5px;
        }
        .stacking-section .stacking-inner{
            text-align: justify;

        }
        .stacking-section .stacking-inner p{
            font-size: clamp(1rem, 1.3vw, 2rem);
            line-height: clamp(1.5rem, 2.2vw, 4rem);
            padding-bottom: 8px;
        }

    </style>

@endsection


@section('content')

    <section class="stacking-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 style="margin-bottom: 40px;">Understanding the Capital Stack</h1>
                    <div class="stacking-inner">
                        <p>
                            The investment term “capital stack” is comprised of the total capital invested in a project. In commercial real estate, these “stacks” typically include: common equity, preferred equity, mezzanine debt and senior debt. Each of these investment levels comes with its own unique risk and rewards. Typically, higher positions in the capital stack earn higher expected returns due to their higher risk.
                        </p>
                        <p>
                            One of the most important parts of investing in commercial real estate is performing due diligence. This includes determining the place you want to be on the capital stack based on your investment objectives and the details of the specific deal you are analyzing. Understanding the capital stack structure is a key component to building a diversified portfolio.
                        </p>
                        <p>
                            The capital stack is arranged in the following order:
                        </p>

                        <p>
                            Common Equity: At the top of the capital stack, this layer contains the most risk of all of the layers in the capital stack. When an investor invests in common equity of a project they are taking an ownership stake in the project. The risk at this layer is greater because the owners of the project are only repaid after all of the other positions in the capital stack are repaid. To compensate investors for this increased risk, equity investors have a pro-rata interest in all of the upside of the project after the other positions have been repaid.
                        </p>
                        <p>
                            Preferred Equity: Another form of equity in a project, and next in line in the capital stack, is preferred equity. This layer in the stack is senior to common equity investments but still subordinate or lower in priority to debt. Preferred Equity allows investors to receive prioritized payments ahead of common equity holders, as well as some percentage share of the total capital gain of a project. As it does contain some measure of seniority to common equity, both the expected risk and potential upside is slightly lower than common equity.
                        </p>
                        <p>
                            Mezzanine Debt: The first form of debt in the capital stack is mezzanine debt. Along with preferred equity, this category is considered to be a hybrid structure as it contains seniority to equity positions within the stack but is subordinate to senior debt. Mezzanine debt investors demand a higher rate of return than senior debt investors due to their unsecured position, meaning that it only gets repaid after all senior obligations have been satisfied. Being a hybrid of sorts, mezzanine debt typically pays periodic interest payments to investors with the potential for additional compensation coming in the form of a small shared interest in future upside or additional accrued interest.
                        </p>
                        <p>
                            Senior Debt: The foundation of the capital stack, and typically the majority of the stack, is senior debt. Senior debt is generally secured by the property, which serves as collateral for the loan. The risk of this category is typically considered to be the lowest of all of the layers in the stack due to its security interest in the collateral. Senior debt holders receive contractual ongoing interest payments before the investors in the higher layers in the capital stack. The relative security afforded to senior debt means it has the lowest level of reward when the interest payments are set.
                        </p>
                        <p>
                            As you’ve probably noticed, commercial real estate offers a wide variety of investment strategies that allows investors to select a place in the capital stack that meets their risk appetite. Understanding the risks and rewards of each layer in the capital stack is the first step in creating an investment portfolio that meets your long-term goals.
                        </p>
                        <p>
                            Be sure to join the FullCapitalStack email list so you can be the first to receive information on available investment opportunities.
                        </p>

                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
