<script>
import AccountIcon from 'vue-material-design-icons/Account.vue';
import AlertIcon from 'vue-material-design-icons/Alert.vue';
import AlertOctagonIcon from 'vue-material-design-icons/AlertOctagon.vue';
import ArrowUpThinIcon from 'vue-material-design-icons/ArrowUpThin.vue';
import ArrowDownThinIcon from 'vue-material-design-icons/ArrowDownThin.vue';
import BellOutlineIcon from 'vue-material-design-icons/BellOutline.vue';
import BookOpenOutlineIcon from 'vue-material-design-icons/BookOpenOutline.vue';
import BookshelfIcon from 'vue-material-design-icons/Bookshelf.vue';
import BriefcaseOutlineIcon from 'vue-material-design-icons/BriefcaseOutline.vue';
import CheckboxMarkedCircleOutlineIcon from 'vue-material-design-icons/CheckboxMarkedCircleOutline.vue';
import ChevronRightIcon from 'vue-material-design-icons/ChevronRight.vue';
import ChevronUpIcon from 'vue-material-design-icons/ChevronUp.vue';
import ChevronDownIcon from 'vue-material-design-icons/ChevronDown.vue';
import CogOutlineIcon from 'vue-material-design-icons/CogOutline.vue';
import EyeIcon from 'vue-material-design-icons/Eye.vue';
import EyeOutlineIcon from 'vue-material-design-icons/EyeOutline.vue';
import EmoticonPoopIcon from 'vue-material-design-icons/EmoticonPoop.vue';
import FilterOutlineIcon from 'vue-material-design-icons/FilterOutline.vue';
import InformationIcon from 'vue-material-design-icons/Information.vue';
import LifebuoyIcon from 'vue-material-design-icons/Lifebuoy.vue';
import LogoutVariantIcon from 'vue-material-design-icons/LogoutVariant.vue';
import MonitorCellphoneIcon from 'vue-material-design-icons/MonitorCellphone.vue';
import NotebookOutlineIcon from 'vue-material-design-icons/NotebookOutline.vue';
import DomainIcon from 'vue-material-design-icons/Domain.vue';
import PaperclipIcon from 'vue-material-design-icons/Paperclip.vue';
import PencilIcon from 'vue-material-design-icons/Pencil.vue';
import PencilOutlineIcon from 'vue-material-design-icons/PencilOutline.vue';
import PlusIcon from 'vue-material-design-icons/Plus.vue';
import PowerIcon from 'vue-material-design-icons/Power.vue';
import SortVariantIcon from 'vue-material-design-icons/SortVariant.vue';
import TrayArrowDownIcon from 'vue-material-design-icons/TrayArrowDown.vue';
import WindowCloseIcon from 'vue-material-design-icons/WindowClose.vue';



export default {
  name: 'Icon',
  props: {
    name: {
      type: String,
      default: 'emoticon-poop-icon'
    },
    size: {
      type: String,
      default: 'md'
    },
    color: {
      type: String,
      default: '#000'
    }
  },
  components: {
    AccountIcon, AlertIcon, AlertOctagonIcon, ArrowUpThinIcon, ArrowDownThinIcon,
    BellOutlineIcon, BookOpenOutlineIcon, BookshelfIcon, BriefcaseOutlineIcon,
    CheckboxMarkedCircleOutlineIcon, ChevronRightIcon, ChevronUpIcon, ChevronDownIcon,
    CogOutlineIcon, EyeIcon, EyeOutlineIcon, EmoticonPoopIcon, FilterOutlineIcon,
    InformationIcon, LifebuoyIcon, LogoutVariantIcon, MonitorCellphoneIcon,
    NotebookOutlineIcon, DomainIcon, PaperclipIcon, PencilIcon,
    PencilOutlineIcon, PlusIcon, PowerIcon, SortVariantIcon,
    TrayArrowDownIcon, WindowCloseIcon
  },
  setup() {
    const iconName = {
      account: 'account-icon',
      alert: 'alert-icon',
      alert_octagon: 'alert-octagon-icon',
      arrow_up_thin: 'arrow-up-thin-icon',
      arrow_down_thin: 'arrow-down-thin-icon',
      bell_outline: 'bell-outline-icon',
      book_open_outline: 'book-open-outline-icon',
      bookshelf: 'bookshelf-icon',
      briefcase: 'briefcase-outline-icon',
      checkbox_marked_circle_outline: 'checkbox-marked-circle-outline-icon',
      chevron_right: 'chevron-right-icon',
      chevron_up: 'chevron-up-icon',
      chevron_down: 'chevron-down-icon',
      cog_outline: 'cog-outline-icon',
      emoticon_poop: 'emoticon-poop-icon',
      filter_outline: 'filter-outline-icon',
      information: 'information-icon',
      eye: 'eye-icon',
      eye_outline: 'eye-outline-icon',
      lifebuoy: 'lifebuoy-icon',
      logout_variant: 'logout-variant-icon',
      monitor_cellphone: 'monitor-cellphone-icon',
      notebook_outline: 'notebook-outline-icon',
      domain: 'domain-icon',
      paperclip: 'paperclip-icon',
      pencil: 'pencil-icon',
      pencil_outline: 'pencil-outline-icon',
      plus: 'plus-icon',
      power: 'power-icon',
      sort_variant: 'sort-variant-icon',
      tray_arrow_down: 'tray-arrow-down-icon',
      window_close: 'window-close-icon'
    }

    const iconSize = {
      'xs': 16,
      'sm': 18,
      'md': 20,
      'lg': 22,
      'xl': 24,
      '2xl': 28,
      '3xl': 32,
      '4xl': 36,
    }

    const iconColor = {
      white: '#FFFFFF',
      black: '#000000',
      gray: '#6b7280',
      red: '#ef4444',
      orange: '#f97316',
      yellow: '#eab308',
      green: '#22c55e',
      blue: '#3b82f6',
      indigo: '#6366f1',
      violet: '#8b5cf6',
      green2: '#16a34a',
      red2: '#dc2626',
      blue2: '#2563eb',
      yellow2: '#ca8a04'
    }

    return {
      iconName, iconSize, iconColor
    }
  }
}
</script>
<template>
  <div>
    <component v-bind:is="iconName[name] || 'emoticon-poop-icon'" :fillColor="iconColor[color] || '#000'"
      :size="iconSize[size] || 20"></component>
  </div>
</template>