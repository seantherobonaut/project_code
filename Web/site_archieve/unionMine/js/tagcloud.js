function customtagcloud() {
    var oopts = {
        textFont: 'Arial',
        textHeight: 20,
        maxSpeed: 0.1,
        decel: 0.9,
        depth: 0.99,
        outlineColour: '#f6f',
        outlineThickness: 3,
        pulsateTo: 0.2,
        pulsateTime: 0.5,
        wheelZoom: false
    },
    ttags = 'taglist',
        lock, shape = 'sphere';
    window.onload = function () {
        TagCanvas.textFont = 'Arial';
        TagCanvas.textColour = '#fff';
        TagCanvas.textHeight = 20;
        TagCanvas.outlineColour = '#550000';
        TagCanvas.maxSpeed = 0.03;
        TagCanvas.minBrightness = 0.2;
        TagCanvas.depth = 0.92;
        TagCanvas.pulsateTo = 0.6;
        TagCanvas.initial = [0.1, -0.1];
        TagCanvas.decel = 0.98;
        TagCanvas.reverse = true;
        TagCanvas.hideTags = false;
        TagCanvas.shadow = '#f00';
        TagCanvas.shadowBlur = 9;
        TagCanvas.weight = false;
        TagCanvas.imageScale = null;
        try {
            TagCanvas.Start('tagcanvas', 'taglist');
            TagCanvas.Start('smallCanvas', 'moreTags', oopts);
            f('options');
        } catch (e) {
            document.getElementById('cmsg').style.display = 'none';
            document.getElementsByTagName('canvas')[0].style.border = '0';
        }
    };
}
(function () {
    var ac, ab, R = Math.abs,
        u = Math.sin,
        l = Math.cos,
        F = Math.max,
        ag = Math.min,
        H = {}, J = {}, M = {
            0: "0,",
            1: "17,",
            2: "34,",
            3: "51,",
            4: "68,",
            5: "85,",
            6: "102,",
            7: "119,",
            8: "136,",
            9: "153,",
            a: "170,",
            A: "170,",
            b: "187,",
            B: "187,",
            c: "204,",
            C: "204,",
            d: "221,",
            D: "221,",
            e: "238,",
            E: "238,",
            f: "255,",
            F: "255,"
        }, f, U, e, n = document,
        E, d = {};
    for (ac = 0; ac < 256; ++ac) {
        ab = ac.toString(16);
        if (ac < 16) {
            ab = "0" + ab
        }
        J[ab] = J[ab.toUpperCase()] = ac.toString() + ","
    }
    function Y(i) {
        return typeof (i) != "undefined"
    }
    function b(i, j, ai) {
        return isNaN(i) ? ai : ag(ai, F(j, i))
    }
    function P() {
        return false
    }
    function T(j) {
        var aj = j.length - 1,
            ai, ak;
        while (aj) {
            ak = ~~ (Math.random() * aj);
            ai = j[aj];
            j[aj] = j[ak];
            j[ak] = ai;
            --aj
        }
    }
    function r(aj, al, aq, an) {
        var am, ap, j, ao, ar = [],
            ak = Math.PI * (3 - Math.sqrt(5)),
            ai = 2 / aj;
        for (am = 0; am < aj; ++am) {
            ap = am * ai - 1 + (ai / 2);
            j = Math.sqrt(1 - ap * ap);
            ao = am * ak;
            ar.push([l(ao) * j * al, ap * aq, u(ao) * j * an])
        }
        return ar
    }
    function af(ak, ai, an, au, ar) {
        var at, av = [],
            al = Math.PI * (3 - Math.sqrt(5)),
            aj = 2 / ak,
            aq, ap, ao, am;
        for (aq = 0; aq < ak; ++aq) {
            ap = aq * aj - 1 + (aj / 2);
            at = aq * al;
            ao = l(at);
            am = u(at);
            av.push(ai ? [ap * an, ao * au, am * ar] : [ao * an, ap * au, am * ar])
        }
        return av
    }
    function L(ai, aj, am, at, aq, ao) {
        var ar, au = [],
            ak = Math.PI * 2 / aj,
            ap, an, al;
        for (ap = 0; ap < aj; ++ap) {
            ar = ap * ak;
            an = l(ar);
            al = u(ar);
            au.push(ai ? [ao * am, an * at, al * aq] : [an * am, ao * at, al * aq])
        }
        return au
    }
    function B(aj, i, j, ai) {
        return af(aj, 0, i, j, ai)
    }
    function O(aj, i, j, ai) {
        return af(aj, 1, i, j, ai)
    }
    function z(ak, i, j, ai, aj) {
        aj = isNaN(aj) ? 0 : aj * 1;
        return L(0, ak, i, j, ai, aj)
    }
    function K(ak, i, j, ai, aj) {
        aj = isNaN(aj) ? 0 : aj * 1;
        return L(1, ak, i, j, ai, aj)
    }
    function t(al, i) {
        var ak = al,
            aj, ai, j = (i * 1).toPrecision(3) + ")";
        if (al[0] === "#") {
            if (!H[al]) {
                if (al.length === 4) {
                    H[al] = "rgba(" + M[al[1]] + M[al[2]] + M[al[3]]
                } else {
                    H[al] = "rgba(" + J[al.substr(1, 2)] + J[al.substr(3, 2)] + J[al.substr(5, 2)]
                }
            }
            ak = H[al] + j
        } else {
            if (al.substr(0, 4) === "rgb(" || al.substr(0, 4) === "hsl(") {
                ak = (al.replace("(", "a(").replace(")", "," + j))
            } else {
                if (al.substr(0, 5) === "rgba(" || al.substr(0, 5) === "hsla(") {
                    aj = al.lastIndexOf(",") + 1, ai = al.indexOf(")");
                    i *= parseFloat(al.substring(aj, ai));
                    ak = al.substr(0, aj) + i.toPrecision(3) + ")"
                }
            }
        }
        return ak
    }
    function k(i, j) {
        if (window.G_vmlCanvasManager) {
            return null
        }
        var ai = n.createElement("canvas");
        ai.width = i;
        ai.height = j;
        return ai
    }
    function A() {
        var j = k(3, 3),
            aj, ai;
        if (!j) {
            return false
        }
        aj = j.getContext("2d");
        aj.strokeStyle = "#000";
        aj.shadowColor = "#fff";
        aj.shadowBlur = 3;
        aj.globalAlpha = 0;
        aj.strokeRect(2, 2, 2, 2);
        aj.globalAlpha = 1;
        ai = aj.getImageData(2, 2, 1, 1);
        j = null;
        return (ai.data[0] > 0)
    }
    function ah(ap, j) {
        var ai = 1024,
            al = ap.weightGradient,
            ak, an, aj, ao, am;
        if (ap.gCanvas) {
            an = ap.gCanvas.getContext("2d")
        } else {
            ap.gCanvas = ak = k(ai, 1);
            if (!ak) {
                return null
            }
            an = ak.getContext("2d");
            ao = an.createLinearGradient(0, 0, ai, 0);
            for (aj in al) {
                ao.addColorStop(1 - aj, al[aj])
            }
            an.fillStyle = ao;
            an.fillRect(0, 0, ai, 1)
        }
        am = an.getImageData(~~ ((ai - 1) * j), 0, 1, 1).data;
        return "rgba(" + am[0] + "," + am[1] + "," + am[2] + "," + (am[3] / 255) + ")"
    }
    function y(al, ak, ai, ao, am, an, j) {
        var aj = (an || 0) + (j && j[0] < 0 ? R(j[0]) : 0),
            i = (an || 0) + (j && j[1] < 0 ? R(j[1]) : 0);
        al.font = ak;
        al.textBaseline = "top";
        al.fillStyle = ai;
        am && (al.shadowColor = am);
        an && (al.shadowBlur = an);
        j && (al.shadowOffsetX = j[0], al.shadowOffsetY = j[1]);
        al.fillText(ao, aj, i)
    }
    function p(av, am, aq, at, al, ai, ao, ap, j, au, ar) {
        var aj = at + R(j[0]) + ap + ap,
            i = al + R(j[1]) + ap + ap,
            ak, an;
        ak = k(aj + au, i + ar);
        if (!ak) {
            return null
        }
        an = ak.getContext("2d");
        y(an, am, ai, av, ao, ap, j);
        return ak
    }
    function aa(an, aq, ar, aj) {
        var at = R(aj[0]),
            ao = R(aj[1]),
            ak = an.width + (at > ar ? at + ar : ar * 2),
            j = an.height + (ao > ar ? ao + ar : ar * 2),
            am = (ar || 0) + (aj[0] < 0 ? at : 0),
            ai = (ar || 0) + (aj[1] < 0 ? ao : 0),
            al, ap;
        al = k(ak, j);
        if (!al) {
            return null
        }
        ap = al.getContext("2d");
        aq && (ap.shadowColor = aq);
        ar && (ap.shadowBlur = ar);
        aj && (ap.shadowOffsetX = aj[0], ap.shadowOffsetY = aj[1]);
        ap.drawImage(an, am, ai, an.width, an.height);
        return al
    }
    function V(av, am, at) {
        var au = parseInt(av.length * at),
            al = parseInt(at * 2),
            aj = k(au, al),
            ap, j, ak, ao, ar, aq, ai, an;
        if (!aj) {
            return null
        }
        ap = aj.getContext("2d");
        ap.fillStyle = "#000";
        ap.fillRect(0, 0, au, al);
        y(ap, at + "px " + am, "#fff", av);
        j = ap.getImageData(0, 0, au, al);
        ak = j.width;
        ao = j.height;
        an = {
            min: {
                x: ak,
                y: ao
            },
            max: {
                x: -1,
                y: -1
            }
        };
        for (aq = 0; aq < ao; ++aq) {
            for (ar = 0; ar < ak; ++ar) {
                ai = (aq * ak + ar) * 4;
                if (j.data[ai + 1] > 0) {
                    if (ar < an.min.x) {
                        an.min.x = ar
                    }
                    if (ar > an.max.x) {
                        an.max.x = ar
                    }
                    if (aq < an.min.y) {
                        an.min.y = aq
                    }
                    if (aq > an.max.y) {
                        an.max.y = aq
                    }
                }
            }
        }
        if (ak != au) {
            an.min.x *= (au / ak);
            an.max.x *= (au / ak)
        }
        if (ao != al) {
            an.min.y *= (au / ao);
            an.max.y *= (au / ao)
        }
        aj = null;
        return an
    }
    function w(i) {
        return "'" + i.replace(/(\'|\")/g, "").replace(/\s*,\s*/g, "', '") + "'"
    }
    function D(i, j, ai) {
        ai = ai || n;
        if (ai.addEventListener) {
            ai.addEventListener(i, j, false)
        } else {
            ai.attachEvent("on" + i, j)
        }
    }
    function Z(al, an, ak, ai) {
        var aj = ai.taglist,
            am = ai.imageScale,
            j;
        if (am && !(an.width && an.height)) {
            D("load", function () {
                Z(al, an, ak, ai)
            }, window);
            return
        }
        if (!al.complete) {
            D("load", function () {
                Z(al, an, ak, ai)
            }, al);
            return
        }
        an.width = an.width;
        an.height = an.height;
        if (am) {
            al.width = an.width * am;
            al.height = an.height * am
        }
        ak.w = al.width;
        ak.h = al.height;
        if (ai.txtOpt && ai.shadow) {
            j = aa(al, ai.shadow, ai.shadowBlur, ai.shadowOffset);
            if (j) {
                ak.image = j;
                ak.w = j.width;
                ak.h = j.height
            }
        }
        aj.push(ak)
    }
    function X(aj, ai) {
        var j = n.defaultView,
            i = ai.replace(/\-([a-z])/g, function (ak) {
                return ak.charAt(1).toUpperCase()
            });
        return (j && j.getComputedStyle && j.getComputedStyle(aj, null).getPropertyValue(ai)) || (aj.currentStyle && aj.currentStyle[i])
    }
    function C(ai, j) {
        var i = 1,
            aj;
        if (ai.weightFrom) {
            i = 1 * (j.getAttribute(ai.weightFrom) || ai.textHeight)
        } else {
            if (aj = X(j, "font-size")) {
                i = (aj.indexOf("px") > -1 && aj.replace("px", "") * 1) || (aj.indexOf("pt") > -1 && aj.replace("pt", "") * 1.25) || aj * 3.3
            } else {
                ai.weight = false
            }
        }
        return i
    }
    function x(i) {
        return i.target && Y(i.target.id) ? i.target.id : i.srcElement.parentNode.id
    }
    function I(j, ai) {
        if (Y(j.offsetX)) {
            return {
                x: j.offsetX,
                y: j.offsetY
            }
        } else {
            var i = q(ai);
            if (Y(j.changedTouches)) {
                j = j.changedTouches[0]
            }
            if (j.pageX) {
                return {
                    x: j.pageX - i.x,
                    y: j.pageY - i.y
                }
            }
        }
        return null
    }
    function m(ai) {
        var j = ai.target || ai.fromElement.parentNode,
            i = v.tc[j.id];
        if (i) {
            i.mx = i.my = -1;
            i.UnFreeze();
            i.EndDrag()
        }
    }
    function W(am) {
        var aj, ai = v,
            j, al, ak = x(am);
        for (aj in ai.tc) {
            j = ai.tc[aj];
            if (j.tttimer) {
                clearTimeout(j.tttimer);
                j.tttimer = null
            }
        }
        if (ak && ai.tc[ak]) {
            j = ai.tc[ak];
            if (al = I(am, ak)) {
                j.mx = al.x;
                j.my = al.y;
                j.Drag(am, al)
            }
            j.drawn = 0
        }
    }
    function Q(aj) {
        var j = v,
            i = n.addEventListener ? 0 : 1,
            ai = x(aj);
        if (ai && aj.button == i && j.tc[ai]) {
            j.tc[ai].BeginDrag(aj)
        }
    }
    function h(ak) {
        var ai = v,
            j = n.addEventListener ? 0 : 1,
            aj = x(ak),
            i;
        if (aj && ak.button == j && ai.tc[aj]) {
            i = ai.tc[aj];
            W(ak);
            if (!i.EndDrag() && !i.touched) {
                i.Clicked(ak)
            }
        }
    }
    function G(ai) {
        var i = v,
            j = x(ai);
        if (j && ai.changedTouches && i.tc[j]) {
            i.tc[j].touched = 1;
            i.tc[j].BeginDrag(ai)
        }
    }
    function o(ai) {
        var i = v,
            j = x(ai);
        if (j && ai.changedTouches && i.tc[j]) {
            S(ai);
            if (!i.tc[j].EndDrag()) {
                i.tc[j].Draw();
                i.tc[j].Clicked(ai)
            }
        }
    }
    function S(am) {
        var aj, ai = v,
            j, al, ak = x(am);
        for (aj in ai.tc) {
            j = ai.tc[aj];
            if (j.tttimer) {
                clearTimeout(j.tttimer);
                j.tttimer = null
            }
        }
        if (ak && ai.tc[ak] && am.changedTouches) {
            j = ai.tc[ak];
            if (al = I(am, ak)) {
                j.mx = al.x;
                j.my = al.y;
                j.Drag(am, al)
            }
            j.drawn = 0
        }
    }
    function ae(ai) {
        var i = v,
            j = x(ai);
        if (j && i.tc[j]) {
            ai.cancelBubble = true;
            ai.returnValue = false;
            ai.preventDefault && ai.preventDefault();
            i.tc[j].Wheel((ai.wheelDelta || ai.detail) > 0)
        }
    }
    function s() {
        var ai = v.tc,
            j;
        for (j in ai) {
            ai[j].Draw()
        }
    }
    function q(ai) {
        var al = n.getElementById(ai),
            i = al.getBoundingClientRect(),
            ao = n.documentElement,
            am = n.body,
            an = window,
            aj = an.pageXOffset || ao.scrollLeft,
            ap = an.pageYOffset || ao.scrollTop,
            ak = ao.clientLeft || am.clientLeft,
            j = ao.clientTop || am.clientTop;
        return {
            x: i.left + aj - ak,
            y: i.top + ap - j
        }
    }
    function c(ai, i) {
        var j = u(i),
            aj = l(i);
        return {
            x: ai.x,
            y: (ai.y * aj) + (ai.z * j),
            z: (ai.y * -j) + (ai.z * aj)
        }
    }
    function a(ai, i) {
        var j = u(i),
            aj = l(i);
        return {
            x: (ai.x * aj) + (ai.z * -j),
            y: ai.y,
            z: (ai.x * j) + (ai.z * aj)
        }
    }
    function ad(ai, ap, ao, ak, an, al) {
        var i, aj, am, j = ai.z1 / (ai.z1 + ai.z2 + ap.z);
        i = ap.y * j * al;
        aj = ap.x * j * an;
        am = ai.z2 + ap.z;
        return {
            x: aj,
            y: i,
            z: am
        }
    }
    function g(i) {
        this.ts = new Date().valueOf();
        this.tc = i;
        this.x = this.y = this.w = this.h = this.sc = 1;
        this.z = 0;
        this.Draw = i.pulsateTo < 1 && i.outlineMethod != "colour" ? this.DrawPulsate : this.DrawSimple;
        this.SetMethod(i.outlineMethod)
    }
    f = g.prototype;
    f.SetMethod = function (ai) {
        var j = {
            block: ["PreDraw", "DrawBlock"],
            colour: ["PreDraw", "DrawColour"],
            outline: ["PostDraw", "DrawOutline"],
            classic: ["LastDraw", "DrawOutline"],
            none: ["LastDraw"]
        }, i = j[ai] || j.outline;
        if (ai == "none") {
            this.Draw = function () {
                return 1
            }
        } else {
            this.drawFunc = this[i[1]]
        }
        this[i[0]] = this.Draw
    };
    f.Update = function (ao, an, ap, al, am, j, ak, i) {
        var ai = this.tc.outlineOffset,
            aj = 2 * ai;
        this.x = am * ao + ak - ai;
        this.y = am * an + i - ai;
        this.w = am * ap + aj;
        this.h = am * al + aj;
        this.sc = am;
        this.z = j.z
    };
    f.DrawOutline = function (al, i, ak, j, ai, aj) {
        al.strokeStyle = aj;
        al.strokeRect(i, ak, j, ai)
    };
    f.DrawColour = function (aj, am, ak, an, ai, i, ao, j, al) {
        return this[ao.image ? "DrawColourImage" : "DrawColourText"](aj, am, ak, an, ai, i, ao, j, al)
    };
    f.DrawColourText = function (ak, an, al, ao, ai, i, ap, j, am) {
        var aj = ap.colour;
        ap.colour = i;
        ap.alpha = 1;
        ap.Draw(ak, j, am);
        ap.colour = aj;
        return 1
    };
    f.DrawColourImage = function (an, aq, ao, ar, am, i, av, j, ap) {
        var at = an.canvas,
            ak = ~~F(aq, 0),
            aj = ~~F(ao, 0),
            al = ag(at.width - ak, ar) + 0.5 | 0,
            au = ag(at.height - aj, am) + 0.5 | 0,
            ai;
        if (E) {
            E.width = al, E.height = au
        } else {
            E = k(al, au)
        }
        if (!E) {
            return this.SetMethod("outline")
        }
        ai = E.getContext("2d");
        ai.drawImage(at, ak, aj, al, au, 0, 0, al, au);
        an.clearRect(ak, aj, al, au);
        av.alpha = 1;
        av.Draw(an, j, ap);
        an.setTransform(1, 0, 0, 1, 0, 0);
        an.save();
        an.beginPath();
        an.rect(ak, aj, al, au);
        an.clip();
        an.globalCompositeOperation = "source-in";
        an.fillStyle = i;
        an.fillRect(ak, aj, al, au);
        an.restore();
        an.globalCompositeOperation = "destination-over";
        an.drawImage(E, 0, 0, al, au, ak, aj, al, au);
        an.globalCompositeOperation = "source-over";
        return 1
    };
    f.DrawBlock = function (al, i, ak, j, ai, aj) {
        al.fillStyle = aj;
        al.fillRect(i, ak, j, ai)
    };
    f.DrawSimple = function (ak, i, j, aj) {
        var ai = this.tc;
        ak.setTransform(1, 0, 0, 1, 0, 0);
        ak.strokeStyle = ai.outlineColour;
        ak.lineWidth = ai.outlineThickness;
        ak.shadowBlur = ak.shadowOffsetX = ak.shadowOffsetY = 0;
        ak.globalAlpha = 1;
        return this.drawFunc(ak, this.x, this.y, this.w, this.h, ai.outlineColour, i, j, aj)
    };
    f.DrawPulsate = function (al, i, j, aj) {
        var ak = new Date().valueOf() - this.ts,
            ai = this.tc;
        al.setTransform(1, 0, 0, 1, 0, 0);
        al.strokeStyle = ai.outlineColour;
        al.lineWidth = ai.outlineThickness;
        al.shadowBlur = al.shadowOffsetX = al.shadowOffsetY = 0;
        al.globalAlpha = ai.pulsateTo + ((1 - ai.pulsateTo) * (0.5 + (l(2 * Math.PI * ak / (1000 * ai.pulsateTime)) / 2)));
        return this.drawFunc(al, this.x, this.y, this.w, this.h, ai.outlineColour, i, j, aj)
    };
    f.Active = function (ai, i, j) {
        return (i >= this.x && j >= this.y && i <= this.x + this.w && j <= this.y + this.h)
    };
    f.PreDraw = f.PostDraw = f.LastDraw = P;

    function N(aj, i, am, ao, an, ak, j, ai) {
        var al = aj.ctxt;
        this.tc = aj;
        this.image = i.src ? i : null;
        this.name = i.src ? "" : i;
        this.title = am.title || null;
        this.a = am;
        this.p3d = {
            x: ao[0] * aj.radius,
            y: ao[1] * aj.radius,
            z: ao[2] * aj.radius
        };
        this.x = this.y = 0;
        this.w = an;
        this.h = ak;
        this.colour = j || aj.textColour;
        this.textFont = ai || aj.textFont;
        this.weight = this.sc = this.alpha = 1;
        this.weighted = !aj.weight;
        this.outline = new g(aj);
        if (!this.image) {
            this.textHeight = aj.textHeight;
            this.extents = V(this.name, this.textFont, this.textHeight);
            this.Measure(al, aj)
        }
        this.SetShadowColour = aj.shadowAlpha ? this.SetShadowColourAlpha : this.SetShadowColourFixed;
        this.SetDraw(aj)
    }
    U = N.prototype;
    U.SetDraw = function (i) {
        this.Draw = this.image ? (i.ie > 7 ? this.DrawImageIE : this.DrawImage) : this.DrawText;
        i.noSelect && (this.CheckActive = P)
    };
    U.Measure = function (am, j) {
        this.h = this.extents ? this.extents.max.y + this.extents.min.y : this.textHeight;
        am.font = this.font = this.textHeight + "px " + this.textFont;
        this.w = am.measureText(this.name).width;
        if (j.txtOpt) {
            var aj = j.txtScale,
                ak = aj * this.textHeight,
                al = ak + "px " + this.textFont,
                ai = [aj * j.shadowOffset[0], aj * j.shadowOffset[1]],
                i;
            am.font = al;
            i = am.measureText(this.name).width;
            this.image = p(this.name, al, ak, i, aj * this.h, this.colour, j.shadow, aj * j.shadowBlur, ai, aj, aj);
            if (this.image) {
                this.w = this.image.width / aj;
                this.h = this.image.height / aj
            }
            this.SetDraw(j);
            j.txtOpt = this.image
        }
    };
    U.SetWeight = function (i) {
        if (!this.name.length) {
            return
        }
        this.weight = i;
        this.Weight(this.tc.ctxt, this.tc);
        this.Measure(this.tc.ctxt, this.tc)
    };
    U.Weight = function (aj, ai) {
        var j = this.weight,
            i = ai.weightMode;
        this.weighted = true;
        if (i == "colour" || i == "both") {
            this.colour = ah(ai, (j - ai.min_weight) / (ai.max_weight - ai.min_weight))
        }
        if (i == "size" || i == "both") {
            this.textHeight = j * ai.weightSize
        }
        this.extents = V(this.name, this.textFont, this.textHeight)
    };
    U.SetShadowColourFixed = function (ai, j, i) {
        ai.shadowColor = j
    };
    U.SetShadowColourAlpha = function (ai, j, i) {
        ai.shadowColor = t(j, i)
    };
    U.DrawText = function (am, j, ak) {
        var ai = this.tc,
            i = this.x,
            al = this.y,
            aj = this.sc;
        am.globalAlpha = this.alpha;
        am.fillStyle = this.colour;
        ai.shadow && this.SetShadowColour(am, ai.shadow, this.alpha);
        am.font = this.font;
        i += (j / aj) - (this.w / 2);
        al += (ak / aj) - (this.h / 2);
        am.setTransform(aj, 0, 0, aj, aj * i, aj * al);
        am.fillText(this.name, 0, 0)
    };
    U.DrawImage = function (ak, aq, aj) {
        var an = this.x,
            al = this.y,
            ar = this.sc,
            j = this.image,
            ao = this.w,
            ai = this.h,
            am = this.alpha,
            ap = this.shadow;
        ak.globalAlpha = am;
        ak.fillStyle = this.colour;
        ap && this.SetShadowColour(ak, ap, am);
        an += (aq / ar) - (ao / 2);
        al += (aj / ar) - (ai / 2);
        ak.setTransform(ar, 0, 0, ar, ar * an, ar * al);
        ak.drawImage(j, 0, 0, ao, ai)
    };
    U.DrawImageIE = function (ak, ao, aj) {
        var j = this.image,
            ap = this.sc,
            an = j.width = this.w * ap,
            ai = j.height = this.h * ap,
            am = (this.x * ap) + ao - (an / 2),
            al = (this.y * ap) + aj - (ai / 2);
        ak.setTransform(1, 0, 0, 1, 0, 0);
        ak.globalAlpha = this.alpha;
        ak.drawImage(j, am, al)
    };
    U.Calc = function (am, al) {
        var i = a(this.p3d, am),
            aj = this.tc,
            ai = aj.minBrightness,
            j = aj.maxBrightness,
            ak = aj.max_radius;
        this.p3d = c(i, al);
        i = ad(aj, this.p3d, this.w, this.h, aj.stretchX, aj.stretchY);
        this.x = i.x;
        this.y = i.y;
        this.sc = (aj.z1 + aj.z2 - i.z) / aj.z2;
        this.alpha = b(ai + (j - ai) * (ak - this.p3d.z) / (2 * ak), 0, 1)
    };
    U.CheckActive = function (aj, an, ai) {
        var ao = this.tc,
            i = this.outline,
            am = this.w,
            j = this.h,
            al = this.x - am / 2,
            ak = this.y - j / 2;
        i.Update(al, ak, am, j, this.sc, this.p3d, an, ai);
        return i.Active(aj, ao.mx, ao.my) ? i : null
    };
    U.Clicked = function (al) {
        var j = this.a,
            ai = j.target,
            aj = j.href,
            i;
        if (ai != "" && ai != "_self") {
            if (self.frames[ai]) {
                self.frames[ai] = aj
            } else {
                try {
                    if (top.frames[ai]) {
                        top.frames[ai] = aj;
                        return
                    }
                } catch (ak) {}
                window.open(aj, ai)
            }
            return
        }
        if (n.createEvent) {
            i = n.createEvent("MouseEvents");
            i.initMouseEvent("click", 1, 1, window, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, null);
            if (!j.dispatchEvent(i)) {
                return
            }
        } else {
            if (j.fireEvent) {
                if (!j.fireEvent("onclick")) {
                    return
                }
            }
        }
        n.location = aj
    };

    function v(am, az, j) {
        var ar, au, aj, aw, aq, an, ap, aA, ax = n.getElementById(am),
            al = ["id", "class", "innerHTML"],
            ao, av = [],
            ai, ay, ak = {
                sphere: r,
                vcylinder: B,
                hcylinder: O,
                vring: z,
                hring: K
            };
        if (!ax) {
            throw 0
        }
        if (Y(window.G_vmlCanvasManager)) {
            ax = window.G_vmlCanvasManager.initElement(ax);
            this.ie = parseFloat(navigator.appVersion.split("MSIE")[1])
        }
        if (ax && (!ax.getContext || !ax.getContext("2d").fillText)) {
            aq = n.createElement("DIV");
            for (ar = 0; ar < al.length; ++ar) {
                aq[al[ar]] = ax[al[ar]]
            }
            ax.parentNode.insertBefore(aq, ax);
            ax.parentNode.removeChild(ax);
            throw 0
        }
        for (ar in v.options) {
            this[ar] = j && Y(j[ar]) ? j[ar] : (Y(v[ar]) ? v[ar] : v.options[ar])
        }
        this.canvas = ax;
        this.ctxt = ax.getContext("2d");
        this.z1 = (19800 / (Math.exp(this.depth) * (1 - 1 / Math.E))) + 20000 - 19800 / (1 - 1 / Math.E);
        this.z2 = this.z1 / this.zoom;
        this.radius = ag(ax.height, ax.width) * 0.37 * (this.z2 + this.z1) / this.z1;
        this.max_radius = this.radius * F(this.radiusX, F(this.radiusY, this.radiusZ));
        this.max_weight = 0;
        this.min_weight = 200;
        this.textFont = this.textFont && w(this.textFont);
        this.textHeight *= 1;
        this.pulsateTo = b(this.pulsateTo, 0, 1);
        this.minBrightness = b(this.minBrightness, 0, 1);
        this.maxBrightness = b(this.maxBrightness, this.minBrightness, 1);
        this.ctxt.textBaseline = "top";
        this.lx = (this.lock + "").indexOf("x") + 1;
        this.ly = (this.lock + "").indexOf("y") + 1;
        this.frozen = 0;
        this.dx = this.dy = 0;
        this.touched = 0;
        this.Animate = this.dragControl ? this.AnimateDrag : this.AnimatePosition;
        if (this.shadowBlur || this.shadowOffset[0] || this.shadowOffset[1]) {
            this.ctxt.shadowColor = this.shadow;
            this.shadow = this.ctxt.shadowColor;
            this.shadowAlpha = A()
        } else {
            delete this.shadow
        }
        try {
            au = n.getElementById(az || am);
            aj = au.getElementsByTagName("a");
            this.taglist = [];
            if (aj.length) {
                ay = this.shape.toString().split(/[(),]/);
                ai = ay.shift();
                this.shape = ak[ai] || ak.sphere;
                ay = [aj.length, this.radiusX, this.radiusY, this.radiusZ].concat(ay);
                aw = this.shape.apply(this, ay);
                this.shuffleTags && T(aw);
                this.listLength = aj.length;
                for (ar = 0; ar < aj.length; ++ar) {
                    an = aj[ar].getElementsByTagName("img");
                    if (an.length) {
                        ap = new Image;
                        ap.src = an[0].src;
                        aA = new N(this, ap, aj[ar], aw[ar], 1, 1);
                        Z(ap, an[0], aA, this)
                    } else {
                        this.taglist.push(new N(this, aj[ar].innerText || aj[ar].textContent, aj[ar], aw[ar], 2, this.textHeight + 2, this.textColour || X(aj[ar], "color"), this.textFont || w(X(aj[ar], "font-family"))))
                    }
                    if (this.weight) {
                        ao = C(this, aj[ar]);
                        if (ao > this.max_weight) {
                            this.max_weight = ao
                        }
                        if (ao < this.min_weight) {
                            this.min_weight = ao
                        }
                        av.push(ao)
                    }
                }
                if (this.weight = (this.max_weight > this.min_weight)) {
                    for (ar = 0; ar < this.taglist.length; ++ar) {
                        this.taglist[ar].SetWeight(av[ar])
                    }
                }
            }
            if (az && this.hideTags) {
                if (v.loaded) {
                    au.style.display = "none"
                } else {
                    D("load", function () {
                        au.style.display = "none"
                    }, window)
                }
            }
        } catch (at) {
            at
        }
        this.yaw = this.initial ? this.initial[0] * this.maxSpeed : 0;
        this.pitch = this.initial ? this.initial[1] * this.maxSpeed : 0;
        if (this.tooltip) {
            if (this.tooltip == "native") {
                this.Tooltip = this.TooltipNative
            } else {
                this.Tooltip = this.TooltipDiv;
                if (!this.ttdiv) {
                    this.ttdiv = n.createElement("div");
                    this.ttdiv.className = this.tooltipClass;
                    this.ttdiv.style.position = "absolute";
                    this.ttdiv.style.zIndex = ax.style.zIndex + 1;
                    D("mouseover", function (i) {
                        i.target.style.display = "none"
                    }, this.ttdiv);
                    n.body.appendChild(this.ttdiv)
                }
            }
        } else {
            this.Tooltip = this.TooltipNone
        }
        if (!this.noMouse && !d[am]) {
            D("mousemove", W, ax);
            D("mouseout", m, ax);
            D("mouseup", h, ax);
            if (this.dragControl) {
                D("mousedown", Q, ax);
                D("touchstart", G, ax);
                D("touchend", o, ax);
                D("touchcancel", o, ax);
                D("touchmove", S, ax);
                D("selectstart", P, ax)
            }
            if (this.wheelZoom) {
                D("mousewheel", ae, ax);
                D("DOMMouseScroll", ae, ax)
            }
            d[am] = 1
        }
        v.started || (v.started = setInterval(s, this.interval))
    }
    e = v.prototype;
    e.Draw = function () {
        if (this.paused) {
            return
        }
        var al = this.canvas,
            aj = al.width,
            ar = al.height,
            au = 0,
            ap = this.yaw,
            an = this.pitch,
            aq = aj / 2 + this.offsetX,
            ao = ar / 2 + this.offsetY,
            ay = this.ctxt,
            am, az, aw, ai = -1,
            ak = this.taglist,
            av = ak.length,
            j = this.frontSelect,
            at = (this.centreFunc == P);
        if (this.frozen && this.drawn) {
            return this.Animate(aj, ar)
        }
        ay.setTransform(1, 0, 0, 1, 0, 0);
        this.active = null;
        for (aw = 0; aw < av; ++aw) {
            ak[aw].Calc(ap, an)
        }
        ak = ak.sort(function (aA, i) {
            return i.p3d.z - aA.p3d.z
        });
        for (aw = 0; aw < av; ++aw) {
            az = this.mx >= 0 && this.my >= 0 && ak[aw].CheckActive(ay, aq, ao);
            if (az && az.sc > au && (!j || az.z <= 0)) {
                am = az;
                am.index = ai = aw;
                au = az.sc
            }
        }
        this.active = am;
        if (!this.txtOpt && this.shadow) {
            ay.shadowBlur = this.shadowBlur;
            ay.shadowOffsetX = this.shadowOffset[0];
            ay.shadowOffsetY = this.shadowOffset[1]
        }
        ay.clearRect(0, 0, aj, ar);
        for (aw = 0; aw < av; ++aw) {
            if (!at && ak[aw].p3d.z <= 0) {
                try {
                    this.centreFunc(ay, aj, ar, aq, ao)
                } catch (ax) {
                    alert(ax);
                    this.centreFunc = P
                }
                at = true
            }
            if (!(ai == aw && am.PreDraw(ay, ak[aw], aq, ao))) {
                ak[aw].Draw(ay, aq, ao)
            }
            ai == aw && am.PostDraw(ay)
        }
        if (this.freezeActive && am) {
            this.Freeze()
        } else {
            this.UnFreeze();
            this.drawn = (av == this.listLength)
        }
        this.Animate(aj, ar);
        am && am.LastDraw(ay);
        al.style.cursor = am ? this.activeCursor : "";
        this.Tooltip(am, ak[ai])
    };
    e.TooltipNone = function () {};
    e.TooltipNative = function (j, i) {
        this.canvas.title = j && i.title ? i.title : ""
    };
    e.TooltipDiv = function (ak, j) {
        var i = this,
            aj = i.ttdiv.style,
            al = i.canvas.id,
            ai = "none";
        if (ak && j.title) {
            if (j.title != i.ttdiv.innerHTML) {
                aj.display = ai
            }
            i.ttdiv.innerHTML = j.title;
            j.title = i.ttdiv.innerHTML;
            if (aj.display == ai && !i.tttimer) {
                i.tttimer = setTimeout(function () {
                    var am = q(al);
                    aj.display = "block";
                    aj.left = am.x + i.mx + "px";
                    aj.top = am.y + i.my + 24 + "px";
                    i.tttimer = null
                }, i.tooltipDelay)
            }
        } else {
            aj.display = ai
        }
    };
    e.AnimatePosition = function (ai, ak) {
        var j = this,
            i = j.mx,
            am = j.my,
            aj, al;
        if (!j.frozen && i >= 0 && am >= 0 && i < ai && am < ak) {
            aj = j.maxSpeed, al = j.reverse ? -1 : 1;
            j.lx || (j.yaw = al * ((aj * 2 * i / ai) - aj));
            j.ly || (j.pitch = al * -((aj * 2 * am / ak) - aj));
            j.initial = null
        } else {
            if (!j.initial) {
                if (j.frozen && !j.freezeDecel) {
                    j.yaw = j.pitch = 0
                } else {
                    j.Decel(j)
                }
            }
        }
    };
    e.AnimateDrag = function (j, aj) {
        var i = this,
            ai = 100 * i.maxSpeed / i.max_radius / i.zoom;
        if (i.dx || i.dy) {
            i.lx || (i.yaw = i.dx * ai / i.stretchX);
            i.ly || (i.pitch = i.dy * -ai / i.stretchY);
            i.dx = i.dy = 0;
            i.initial = null
        } else {
            if (!i.initial) {
                i.Decel(i)
            }
        }
    };
    e.Freeze = function () {
        if (!this.frozen) {
            this.preFreeze = [this.yaw, this.pitch];
            this.frozen = 1;
            this.drawn = 0
        }
    };
    e.UnFreeze = function () {
        if (this.frozen) {
            this.yaw = this.preFreeze[0];
            this.pitch = this.preFreeze[1];
            this.frozen = 0
        }
    };
    e.Decel = function (i) {
        var ai = i.minSpeed,
            aj = R(i.yaw),
            j = R(i.pitch);
        if (!i.lx && aj > ai) {
            i.yaw = aj > i.z0 ? i.yaw * i.decel : 0
        }
        if (!i.ly && j > ai) {
            i.pitch = j > i.z0 ? i.pitch * i.decel : 0
        }
    };
    e.Zoom = function (i) {
        this.z2 = this.z1 * (1 / i);
        this.drawn = 0
    };
    e.Clicked = function (aj) {
        var ai = this.taglist,
            i = this.active;
        try {
            if (i && ai[i.index]) {
                ai[i.index].Clicked(aj)
            }
        } catch (j) {}
    };
    e.Wheel = function (j) {
        var ai = this.zoom + this.zoomStep * (j ? 1 : -1);
        this.zoom = ag(this.zoomMax, F(this.zoomMin, ai));
        this.Zoom(this.zoom)
    };
    e.BeginDrag = function (i) {
        this.down = I(i, this.canvas.id);
        i.cancelBubble = true;
        i.returnValue = false;
        i.preventDefault && i.preventDefault()
    };
    e.Drag = function (ak, aj) {
        if (this.dragControl && this.down) {
            var ai = this.dragThreshold * this.dragThreshold,
                j = aj.x - this.down.x,
                i = aj.y - this.down.y;
            if (this.dragging || j * j + i * i > ai) {
                this.dx = j;
                this.dy = i;
                this.dragging = 1;
                this.down = aj
            }
        }
    };
    e.EndDrag = function () {
        var i = this.dragging;
        this.dragging = this.down = null;
        return i
    };
    e.Pause = function () {
        this.paused = true
    };
    e.Resume = function () {
        this.paused = false
    };
    v.Start = function (ai, i, j) {
        v.tc[ai] = new v(ai, i, j)
    };
    v.Pause = function (i) {
        v.tc[i] && v.tc[i].Pause()
    };
    v.Resume = function (i) {
        v.tc[i] && v.tc[i].Resume()
    };
    v.tc = {};
    v.options = {
        z1: 20000,
        z2: 20000,
        z0: 0.0002,
        freezeActive: false,
        freezeDecel: false,
        activeCursor: "pointer",
        pulsateTo: 1,
        pulsateTime: 3,
        reverse: false,
        depth: 0.5,
        maxSpeed: 0.05,
        minSpeed: 0,
        decel: 0.95,
        interval: 20,
        minBrightness: 0.1,
        maxBrightness: 1,
        outlineColour: "#ffff99",
        outlineThickness: 2,
        outlineOffset: 5,
        outlineMethod: "outline",
        textColour: "#ff99ff",
        textHeight: 15,
        textFont: "Helvetica, Arial, sans-serif",
        shadow: "#000",
        shadowBlur: 0,
        shadowOffset: [0, 0],
        initial: null,
        hideTags: true,
        zoom: 1,
        weight: false,
        weightMode: "size",
        weightFrom: null,
        weightSize: 1,
        weightGradient: {
            0: "#f00",
            0.33: "#ff0",
            0.66: "#0f0",
            1: "#00f"
        },
        txtOpt: true,
        txtScale: 2,
        frontSelect: false,
        wheelZoom: false,
        zoomMin: 0.3,
        zoomMax: 3,
        zoomStep: 0.05,
        shape: "sphere",
        lock: null,
        tooltip: null,
        tooltipDelay: 300,
        tooltipClass: "tctooltip",
        radiusX: 1,
        radiusY: 1,
        radiusZ: 1,
        stretchX: 1,
        stretchY: 1,
        offsetX: 0,
        offsetY: 0,
        shuffleTags: false,
        noSelect: false,
        noMouse: false,
        imageScale: 1,
        paused: false,
        dragControl: false,
        dragThreshold: 4,
        centreFunc: P
    };
    for (ac in v.options) {
        v[ac] = v.options[ac]
    }
    window.TagCanvas = v;
    D("load", function () {
        v.loaded = 1
    }, window)
})();