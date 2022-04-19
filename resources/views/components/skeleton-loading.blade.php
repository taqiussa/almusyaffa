<div>
    <div class="ph-item">
        <div class="ph-col-12">
            <div class="ph-picture"></div>
            <div class="ph-row">
                <div class="ph-col-6 big"></div>
                <div class="ph-col-4 empty big"></div>
                <div class="ph-col-2 big"></div>
                <div class="ph-col-4"></div>
                <div class="ph-col-8 empty"></div>
                <div class="ph-col-6"></div>
                <div class="ph-col-6 empty"></div>
                <div class="ph-col-12"></div>
            </div>
        </div>
    </div>
    @push('wire-loading')
        
    <style>
        /**
    * placeholder-loading v0.5.0
    * Author: Zalog (https://www.zalog.ro/)
    * License: MIT
    **/
    .ph-item{background-color:#fff;border:1px solid #e6e6e6;border-radius:2px;direction:ltr;display:flex;flex-wrap:wrap;margin-bottom:30px;overflow:hidden;padding:30px 15px 15px;position:relative}.ph-item,.ph-item *,.ph-item :after,.ph-item :before{box-sizing:border-box}.ph-item:before{-webkit-animation:phAnimation .8s linear infinite;animation:phAnimation .8s linear infinite;background:linear-gradient(90deg,hsla(0,0%,100%,0) 46%,hsla(0,0%,100%,.35) 50%,hsla(0,0%,100%,0) 54%) 50% 50%;bottom:0;content:" ";left:50%;margin-left:-250%;pointer-events:none;position:absolute;right:0;top:0;width:500%;z-index:1}.ph-item>*{display:flex;flex:1 1 auto;flex-flow:column;margin-bottom:15px;padding-left:15px;padding-right:15px}.ph-row{display:flex;flex-wrap:wrap;margin-top:-7.5px}.ph-row div{background-color:#ced4da;height:10px;margin-top:7.5px}.ph-row .big,.ph-row.big div{height:20px}.ph-row .empty{background-color:hsla(0,0%,100%,0)}.ph-col-2{flex:0 0 16.6666666667%}.ph-col-4{flex:0 0 33.3333333333%}.ph-col-6{flex:0 0 50%}.ph-col-8{flex:0 0 66.6666666667%}.ph-col-10{flex:0 0 83.3333333333%}.ph-col-12{flex:0 0 100%}[class*=ph-col]{direction:ltr}[class*=ph-col]>*+.ph-row{margin-top:0}[class*=ph-col]>*+*{margin-top:7.5px}.ph-avatar{background-color:#ced4da;border-radius:50%;min-width:60px;overflow:hidden;position:relative;width:100%}.ph-avatar:before{content:" ";display:block;padding-top:100%}.ph-picture{background-color:#ced4da;height:120px;width:100%}@-webkit-keyframes phAnimation{0%{transform:translate3d(-30%,0,0)}to{transform:translate3d(30%,0,0)}}@keyframes phAnimation{0%{transform:translate3d(-30%,0,0)}to{transform:translate3d(30%,0,0)}}
    </style>    
    @endpush
</div>